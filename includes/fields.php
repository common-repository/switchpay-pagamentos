<?php

return [
    "enabled" => [
        "title"   => "Ativar/Desativar",
        "type"    => "checkbox",
        "label"   => "SwitchPay",
        "default" => "yes"
    ],
    "token_id" => [
        "title"   => "Token ID",
        "type"    => "text",
        "default" => ""
    ],
    "client_secret" => [
        "title"   => "Client Secret",
        "type"    => "text",
        "default" => ""
    ],
    "ambiente" => [
        "title"   => "ambiente",
        "type"    => "select",
        "label"   => "Escolha de ambiente (sandbox ou produção)",
        "default" => "dev",
        "options" => [
            "dev" => "Teste",
            "prod" => "Produção",
        ]
    ], 
    "card" => [
        "title"   => "Habilitar Cartão Credito",
        "type"    => "checkbox",
        "label"   => "",
        "default" => "no"
    ],
    "card_title" => [
        "title"   => "Título",
        "type"    => "text",
        "label"   => "",
        "default" => "Cartão"
    ],
    "card_description" => [
        "title"   => "Descrição",
        "type"    => "textarea",
        "label"   => "",
        "default" => ""
    ],
    "card_portion" => [
        "title"   => "Números de parcelas aceita",
        "type"    => "number",
        "label"   => "",
        "default" => "1",
        "description" => "Minimo de 1 e máximo de 12"
    ],
    "card_min_amout_portion" => [
        "title"   => "Valor mínimo para parcelar",
        "type"    => "text",
        "label"   => "",
        "default" => "15",
        "description" => "O valor mínimo é de R$ 1,00"
    ],
    // "antecipar" => [
    //     "title"   => "Antecipação de recebíveis",
    //     "type"    => "checkbox",
    //     "label"   => "",
    //     "default" => ""
    // ],
    "juros" => [
        "title"   => "Parcelamento com juros (adicionar porcentagem por parcela)",
        "type"    => "text",
        "label"   => "",
        "default" => "0",
        "description" => "Para pagamento 1x não será adicionado juros"
    ],
    "juros_min" => [
        "title"   => "Quantidade de parcelas sem juros",
        "type"    => "number",
        "label"   => "",
        "default" => "1",
        
    ],

    "ticket" => [
        "title"   => "Habilitar Boleto",
        "type"    => "checkbox",
        "label"   => "",
        "default" => "no"
    ],
    "ticket_title" => [
        "title"   => "Título",
        "type"    => "text",
        "label"   => "",
        "default" => "Boleto"
    ],
    "ticket_description" => [
        "title"   => "Descrição",
        "type"    => "textarea",
        "label"   => "",
        "default" => ""
    ],
    "ticket_instrucao" => [
        "title"   => "Instruções de Pagamento onde aparecera na tela de agradecimento do pedido",
        "type"    => "textarea",
        "label"   => "",
        "default" => ""
    ],
    "ticket_carencia" => [
        "title"   => "Quantidade de dias para vencimento.",
        "type"    => "number",
        "label"   => "",
        "default" => "3"
    ],
    "ticket_dias_apos_vencimento" => [
        "title"   => "Quantidade de dias para pagamento após o vencimento",
        "type"    => "number",
        "label"   => "",
        "default" => "5"
    ],
    "ticket_multa" => [
        "title"   => "Multa",
        "type"    => "text",
        "label"   => "",
        "description" => "Limite máximo de 2,00% (máximo permitido por lei)",
        "default" => "2"
    ],
    "ticket_juros" => [
        "title"   => "Juros",
        "type"    => "text",
        "label"   => "",
        "description" => "Limite máximo de 1,00% (máximo permitido por lei)",
        "default" => "1"
    ],
    // "ticket_discout" => [
    //     "title"   => "Adicionar desconto em % para esse método de pagamento Boleto",
    //     "type"    => "text",
    //     "description"   => "",
    //     "default" => ""
    // ],
    "pix" => [
        "title"   => "Habilitar PIX",
        "type"    => "checkbox",
        "label"   => "",
        "default" => "no"
    ],
    "pix_title" => [
        "title"   => "Título PIX",
        "type"    => "text",
        "label"   => "",
        "default" => "PIX"
    ],
    // "pix_discount" => [
    //     "title"   => "Adicionar desconto em % para esse método de pagamento PIX",
    //     "type"    => "text",
    //     "description"   => "",
    //     "default" => ""
    // ],
];