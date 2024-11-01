<?php
// add_filter('manage_edit-shop_order_columns', function ($cols) {
//     $cols["link_boleto"] = "Boleto";
//     return $cols;
// });
// add_action('manage_shop_order_posts_custom_column', function ($col_name) {
//     global $post;
//     $tipo_pagamento = get_post_meta($post->ID, 'TYPE_PAYMENT', true);
//     if ($tipo_pagamento == "boleto" && $col_name == "link_boleto") {
//         $link = get_post_meta($post->ID, 'LINK_BOLETO', true);
//         //esc_html_e("<a href=\"{$link}\" class=\"btn\" target=\"_blank\"> link boleto </a>")
//         echo "<a href=\"{$link}\" class=\"btn\" target=\"_blank\"> link boleto </a>";
//     }
// });
// add_filter('woocommerce_account_orders_columns', function ($cols) {
//     $cols["link_boleto"] = "Boleto";
//     return $cols;
// });
// add_action('woocommerce_my_account_my_orders_column_link_boleto', function ($order) {
//     if ($order->get_meta('TYPE_PAYMENT') == "boleto") {
//         $link = $order->get_meta('LINK_BOLETO');
//         //esc_html_e("<a href=\"{$link}\" class=\"btn\" target=\"_blank\"> link boleto </a>")
//         echo "<a href=\"{$link}\" class=\"btn\" target=\"_blank\"> link boleto </a>";
//     }
// });