<?php
function more_switchpay($order_id) {
   $order = wc_get_order($order_id);

   $type = get_post_meta($order_id, 'TYPE_PAYMENT', true);
   $link_boleto = get_post_meta($order_id, 'LINK_BOLETO', true);
   $codigo_boleto = get_post_meta($order_id, 'BARCODE', true);
   $qr_code = get_post_meta($order_id, 'QR_CODE', true);
   $qr_src = get_post_meta($order_id, 'QR_SRC', true);



   if($type == 'boleto') {
       ?><h3>Dados Boleto</h3><?php
       echo("<p>".esc_html("você pode copiar o numero do boleto: "). "<b>" .esc_html("{$codigo_boleto}"). "</b>"."</p>");
       echo("<p>ou <a href=\"".esc_html($link_boleto)."\" target=\"_blank\"> Clique aqui para imprimir </a> </p>");
   }

   if($type == 'PIX') {
       $dados_pix = "Dados PIX";
       $tempo_pagamento = "Você tem 30 minutos para realizar o pagamento, após esse período o pedido será cancelado.";
       echo("<h3>".esc_html($dados_pix)."</h3> <br>");
       echo("<img src=\"".esc_url($qr_src)."\" width=\"300\"> <br>");
       echo("<p>".esc_html($tempo_pagamento)."</p> <br>");
       echo("<input type=\"text\" value=\"".esc_html($qr_code)."\" class=\"js-link-pix\"></input>");
       echo("<button class=\"btn\" onclick=\"copiar('.js-link-pix')\"> COPIAR PIX </button>");
    }

   esc_js("<script> function copiar(selector) { document.querySelector(selector).select(); document.execCommand('copy'); } </script>");

}

add_action('woocommerce_thankyou', 'more_switchpay' );
add_action('woocommerce_view_order', 'more_switchpay' );