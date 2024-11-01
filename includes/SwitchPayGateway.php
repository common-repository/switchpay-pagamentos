<?php
class SwitchPayGateway extends WC_Payment_Gateway
{
    function __construct()
    {
        $this->id = 'SwitchPayGateway';
        $this->icon = "";
        $this->title = "Gateway SwitchPay";
        $this->method_title = "SwitchPay";
        $this->method_description  = "A SwitchPay é a melhor forma de receber pagamentos online";
        $this->has_fields = true;
        $this->form_fields =  require __DIR__ . '/fields.php';
        $this->init_settings();
        $this->order_button_text = "Fechar Pedido";
        $this->order_id = null;

        $this->token_id = $this->get_option('token_id');
        $this->client_secret = $this->get_option('client_secret');
        $this->ambiente = $this->get_option('ambiente');
        $this->card = $this->get_option('card');
        $this->card_title = $this->get_option('card_title');
        $this->card_description = $this->get_option('card_description');
        $this->card_portion = $this->get_option('card_portion');
        $this->card_min_amout_portion = $this->get_option('card_min_amout_portion');
        $this->antecipar = $this->get_option('antecipar');
        $this->juros = $this->get_option('juros');
        $this->juros_min = $this->get_option('juros_min');
        $this->ticket = $this->get_option('ticket');
        $this->ticket_title = $this->get_option('ticket_title');
        $this->ticket_description = $this->get_option('ticket_description');
        $this->ticket_instrucao = $this->get_option('ticket_instrucao');
        $this->ticket_carencia = $this->get_option('ticket_carencia');
        $this->ticket_dias_apos_vencimento = $this->get_option('ticket_dias_apos_vencimento');
        $this->ticket_multa = $this->get_option('ticket_multa');
        $this->ticket_juros = $this->get_option('ticket_juros');
        $this->ticket_discout = $this->get_option('ticket_discout');

        $this->pix = $this->get_option('pix');
        $this->pix_title = $this->get_option('pix_title');
        $this->pix_discount = $this->get_option('pix_discount');

        add_action('woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options']);
        add_filter('woocommerce_order_button_text', function () {
            return $this->order_button_text;
        });
    }
    public function payment_fields()
    {
        global $woocommerce;
        $SwitchPayData = [
            "ambiente" => $this->ambiente,
            "card" => $this->card,
            "card_title" => $this->card_title,
            "card_description" => $this->card_description,
            "card_portion" => $this->card_portion,
            "card_min_amout_portion" => $this->card_min_amout_portion,
            "antecipar" => $this->antecipar,
            "juros" => $this->juros,
            "juros_min" => empty($this->juros_min) ? 0 : $this->juros_min,
            "ticket" => $this->ticket,
            "ticket_title" => $this->ticket_title,
            "ticket_description" => $this->ticket_description,
            "ticket_instrucao" => $this->ticket_instrucao,
            "ticket_carencia" => $this->ticket_carencia,
            "ticket_dias_apos_vencimento" => $this->ticket_dias_apos_vencimento,
            "ticket_multa" => $this->ticket_multa,
            "ticket_juros" => $this->ticket_juros,
            "ticket_discout" => $this->ticket_discout,
            "total" => WC()->cart->total,
            "pix" => $this->pix,
            "pix_title" => $this->pix_title,
            "pix_discount" => $this->pix_discount,
        ];
        $SwitchPayDataJson = json_encode($SwitchPayData);
        $SwitchPayDataJson = sanitize_text_field($SwitchPayDataJson);
        esc_js("<script> var SwitchPayData = {$SwitchPayDataJson}; </script>");
        
        
        include_once __DIR__ . "/../public/checkout.php";
    }
    function process_payment($order_id)
    {
        global $woocommerce;
        $order = new WC_Order($order_id);

        $itens = array_map(function ($product) {
            return $product['name'] . "x" . $product['qty'];
        }, $order->get_items());
        $description = implode(',', $itens);

        $dtcart = sanitize_text_field($_POST['data_cartao']);
        $payment = sanitize_text_field($_POST['payment_type']);
        $numcart = sanitize_text_field($_POST['numero_cartao']);
        $namcart = sanitize_text_field($_POST['nome_cartao']);
        $cvvcart = sanitize_text_field($_POST['cvv_cartao']);
        $parcelcart = sanitize_text_field($_POST['parcelas_cartao']);
        $data = explode('/',  $dtcart ?? '/');
        $ticket_dias_apos_vencimento = $this->ticket_carencia + $this->ticket_dias_apos_vencimento;
        $date_format = explode("/",$order->get_meta('_billing_birthdate'));
        $playload = [
            "buyer" => [
                "firstName" => $order->get_billing_first_name(),
                "lastName" => $order->get_billing_last_name(),
                "email" => $order->get_billing_email(),
                "phone" => $order->get_billing_phone(),
                "dateBirth" => $date_format[2]."-".$date_format[1]."-".$date_format[0],
                "doc" => $order->get_meta('_billing_cpf'),
                "address" => [
                    "city" => $order->get_billing_city(),
                    "complement" => $order->get_billing_address_2(),
                    "neighborhood" => $order->get_meta('_billing_neighborhood'),
                    "number" => $order->get_meta('_billing_number'),
                    "postCode" => $order->get_billing_postcode(),
                    "state" => $order->get_billing_state(),
                    "street" => $order->get_billing_address_1(),
                ]
            ],
            "description" => $description,
            "method" => $payment ?? 'boleto',
            "amount" => floatval($order->get_total()),
            "reference" => $order_id,
            "callBack" => get_site_url() . "/?wc-api=switchpay",
            "card" => [
                "cardNumber" => intval(str_replace(' ', '', $numcart)),
                "expirationMonth" => $data[0],
                "expirationYear" => $data[1],
                "holderName" => $namcart,
                "securityCode" => $cvvcart
            ],
            "installment" => [
                "numberInstallments" => $parcelcart,
                "fee" => $this->juros_min < $parcelcart ? $this->juros : 0, 
            ],
            "payment" => [
                "expirationDate" => date('Y-m-d', strtotime("+{$this->ticket_carencia} days", strtotime(date('Y-m-d')))),
                "paymentLimitDate" => date('Y-m-d', strtotime("+{$ticket_dias_apos_vencimento} days", strtotime(date('Y-m-d')))),
                "bodyInstructions" => [$this->ticket_instrucao],
                "billing" => [
                    "lateFee" => [
                        "amount" => $this->ticket_multa,
                        "startDate" => date('Y-m-d', strtotime("+5 days", strtotime(date('Y-m-d'))))
                    ],
                    "interest" => [
                        "amount" => $this->ticket_juros,
                        "startDate" => date('Y-m-d', strtotime("+5 days", strtotime(date('Y-m-d'))))
                    ]
                ]
            ],
        ];

        $swit_pay = new SwitchPay();
        $swit_pay->user = $this->token_id;
        $swit_pay->pass = $this->client_secret;
        if($this->ambiente=='prod') {
            $swit_pay->homologacao = false;
        }
        $response = $swit_pay->payment($playload);

        file_put_contents(__DIR__ . "/../parametros.json", json_encode($playload, JSON_PRETTY_PRINT));
        file_put_contents(__DIR__ . "/../response.json", json_encode($response, JSON_PRETTY_PRINT));



        
        $barcode = sanitize_text_field($response['paymentMethod']["barcode"]);
        $url = sanitize_text_field($response['paymentMethod']['boleto']["url"]);
        $qrCode_code = sanitize_text_field($response['paymentMethod']["qrCode"]);
        $qrCode_image = sanitize_text_field($response['paymentMethod']["qrCodeImage"]);
        update_post_meta($order_id, 'TYPE_PAYMENT', $payment ?? 'boleto');
        update_post_meta($order_id, 'BARCODE', $barcode ?? null);
        update_post_meta($order_id, 'LINK_BOLETO', $url ?? null);
        update_post_meta($order_id, 'QR_CODE', $qrCode_code ?? null);
        update_post_meta($order_id, 'QR_SRC', $qrCode_image ?? null);

        if ($payment == "boleto") {
            $order->add_order_note($barcode, $is_customer_note = 0, 'woothemes');
            $order->add_order_note($url,  $is_customer_note = 0, 'woothemes');
			
        }
		
		if ($response['tag'] == "T00") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T01") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T02") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T03") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T04") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T05") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T06") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T07") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T08") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T09") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T10") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T11") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T12") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T13") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T14") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['tag'] == "T15") {
			$order->update_status('failed', 'falhou');

        }
		
		if ($response['error'] ) {
			return array(
                'result' => "error",
                'redirect' => $this->get_return_url($order)
            );
        }
		
		if ($response['status'] == "succeeded" ){
			if ($payment == "credit") {
				 $order->update_status('processing', 'Pago');
			}
		}
		return array(
			'result' => "success",
			'redirect' => $this->get_return_url($order)
		);
    }
}