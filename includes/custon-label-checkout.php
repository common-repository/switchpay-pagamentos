<?php

add_filter('woocommerce_checkout_fields', function ($fields) {
    $fields['billing']['billing_number'] = [
        'type'        => 'text',
        'label'       => "Número",
        'placeholder' => "Digite aqui número",
        'required'    => true,
        'priority'    => 61
    ];
    $fields['billing']['billing_neighborhood'] = [
        'type'        => 'text',
        'label'       => "bairro",
        'placeholder' => "Digite aqui seu bairro",
        'required'    => true,
        'priority'    => 61
    ];
    $fields['billing']['billing_cpf'] = [
        'type' => 'text',
        'label' => "CPF",
        'placeholder' => "000.000.000-00",
        'required' => true,
        'priority'    => 30
    ];
    $fields['billing']['billing_birthdate'] = [
        'type' => 'date',
        'label' => "Data de Nascimento",
        'placeholder' => "",
        'required' => true,
        'priority'    => 30
    ];
    return $fields;
});