<?php

add_action('woocommerce_api_switchpay', function () {

    header('HTTP/1.1 200 OK');

    $switch = new SwitchPayGateway();
    $token_atual = getallheaders()["Authorization"];
    $token_site = "Basic " . base64_encode("{$switch->token_id}:{$switch->client_secret}");

    if ($token_atual != $token_site) {
        echo json_encode([
            "error" => true,
            "next" => false,
            "message" => "Token Invalido"
        ]);
        die;
    }

    $request = file_get_contents('php://input');
    $request = json_decode($request, true);

    $os_id =  $request['reference'] ?? null;
    $status_wc = $request['status_wc'] ?? null;
    $note =  $request['status'] ?? null;

    

    $order = new WC_Order($os_id);
    $order->update_status($status_wc, $note);

    echo json_encode([
        "next" => true,
        "required_parameter" => [
            "reference",
            "status_wc",
            "note",
        ],
        "status_wc" => [
            'on-hold',
            'completed',
            'failed',
        ]
    ]);
    
    die;

});