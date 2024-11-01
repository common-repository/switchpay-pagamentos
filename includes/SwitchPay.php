<?php

class SwitchPay
{
    private $base = 'https://switchpay.tec.br/v1';
    private $base_producao = 'https://api.switchpay.com.br/v1';
    public $homologacao = true;
    public $user, $pass;
    public function get_transation($id_transaction)
    {
        $path = "/transactions/{$id_transaction}";
        $full_url = $this->base . $path;
        $header = "Authorization: Basic " . $this->Auth() . "\r\n";
        $options = [
            'http' => [
                'header' => $header,
                'method' => "GET",
                "ignore_errors" => true,
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($full_url, false, $context);
        return json_decode($response, true);
    }
    public function Auth()
    {
        return base64_encode("{$this->user}:{$this->pass}");
    }
    public function payment($playload)
    {
        $path = '/transactions';
        $full_url = $this->base . $path;
        if( !$this->homologacao ) {
            $full_url = $this->base_producao . $path;
        }
        $header = "Authorization: Basic " . $this->Auth() . "\r\n";
        $header .= "Content-Type: application/json \r\n";
        $options = [
            'http' => [
                'header' => $header,
                'method' => "POST",
                "ignore_errors" => true,
                "content" => json_encode($playload),
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($full_url, false, $context);
        return json_decode($response, true);
    }
}