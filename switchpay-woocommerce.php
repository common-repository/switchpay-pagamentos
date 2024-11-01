<?php

/**
 * Plugin Name: SwitchPay pagamentos para woocommerce     
 * Plugin URI:  https://wordpress.org/plugins/switchpay-pagamentos      
 * Description: A SwitchPay é a melhor forma de receber pagamentos online na modalidade de cartão de crédito e boleto bancário, sendo possível o cliente fazer todo o pagamento sem sair da sua loja WooCommerce de forma rápida, fácil e prática!   
 * Version: 1.0.9
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: SwitchPay serviços     
 * Author URI:   https://www.switchpay.com.br     
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') || exit;

include __DIR__ . "/includes/custon-label-checkout.php";
include __DIR__ . "/includes/webhook.php";
include __DIR__ . "/includes/SwitchPay.php";
include __DIR__ . "/includes/thankyou.php";
include __DIR__ . "/includes/cols-table.php";
include __DIR__ . "/includes/switchpaycalls.php";

add_action('plugins_loaded', function () {
    include_once __DIR__ . "/includes/SwitchPayGateway.php";
});

add_filter('woocommerce_payment_gateways', function ($methods) {
    $methods[] = 'SwitchPayGateway';
    return $methods;
});


add_filter('plugin_action_links_'.plugin_basename(__FILE__), function ( $links ) {
    $url = admin_url( 'admin.php?page=wc-settings&tab=checkout&section=switchpaygateway' );
    $texto = __('Settings');
	$links[] = "<a href=\"{$url}\">{$texto}</a>";
	return $links;
} );