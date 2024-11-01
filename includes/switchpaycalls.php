<?php

function switchpaycalls() {
    wp_enqueue_style('CSS-Reset', plugins_url('/public/css/reset.css', __DIR__ ));
    wp_enqueue_style('CSS-Cartao', plugins_url('/public/css/cartao.css', __DIR__ ));
    wp_enqueue_style('CSS-Boleto', plugins_url('/public/css/boleto.css', __DIR__ ));
    wp_enqueue_style('CSS-Bara', plugins_url('/public/css/barra.css', __DIR__ ));
    wp_enqueue_style('CSS-Tab',plugins_url('/public/css/tab.css', __DIR__ ));
    wp_enqueue_style('CSS-Pix', plugins_url('/public/css/pix.css', __DIR__ ));

    wp_enqueue_script('JS-INDEX', plugins_url('/public/js/index.js', __DIR__ ), false);
    wp_enqueue_script('JS-MASCARA', plugins_url('/public/js/mascara-cartao.js', __DIR__ ), false);
    wp_enqueue_script('JS-TAB', plugins_url( '/public/js/tab-js.js', __DIR__ ), false);
    
}

add_action('wp_enqueue_style', 'switchpaycalls');
add_action('wp_enqueue_scripts', 'switchpaycalls');