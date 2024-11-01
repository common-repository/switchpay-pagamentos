<?php
$base = plugin_dir_url(dirname(__FILE__)) . "public";
?>


<?php $card = sanitize_text_field($SwitchPayData["card"])?>
<?php $ticket = sanitize_text_field($SwitchPayData["ticket"]) ?>
<?php $ticket_title = sanitize_text_field($SwitchPayData["ticket_title"]) ?>
<?php $card_title = sanitize_text_field($SwitchPayData["card_title"]) ?>
<?php $pix_title = sanitize_text_field($SwitchPayData["pix_title"]) ?>
<?php $pix = sanitize_text_field($SwitchPayData["pix"]) ?>

<div class="all_project">
    <div class="swithpay-card">
        <div class="barra-tab">
            <div class="barra-top barraTab-js">
                
                
                <div class="selecao1 tab-img-js img-barra-top tab-btn tab-btn-none" onclick="ativa(1, this)" <?php esc_html_e($card == "yes" ? "" : "hidden") ?>>
                    <img class="tab-cursor " src="<?php esc_html_e($base) ?>/images/cartao.png">
                    <b class="barra-desc barra-txt-js">
                        <?php esc_html_e($card_title) ?>
                    </b>
                </div>
                <div class="selecao1 tab-img-js img-barra-top tab-btn" onclick="ativa(2, this)" <?php esc_html_e($ticket == "yes" ? "" : "hidden")  ?>>
                    <img class="barra-boleto tab-cursor" src="<?php esc_html_e($base)  ?>/images/2-codigo-de-barras.png">
                    <b class="barra-desc barra-txt-js">
                        <?php esc_html_e($ticket_title)  ?>
                    </b>
                </div>
                <div class="selecao1 tab-img-js img-barra-top tab-btn" onclick="ativa(3, this)" <?php esc_html_e($pix == "yes" ? "" : "hidden")  ?>>
                    <img class="tab-cursor" src="<?php esc_html_e($base)  ?>/images/logo-pix.png">
                    <b class="barra-desc barra-txt-js">
                        <?php esc_html_e($pix_title)  ?>
                    </b>
                </div>
            </div>

        </div>
    </div>


    <div class="space"></div>
    <div class="ativa-1 ativa-tab-js border-css tab_1" <?php esc_html_e($card == "yes" ? "" : "hidden")  ?>>
        <div class="">
            <div class="card">
                <svg class="swithpay-card" viewBox="0 0 61.383 39.158" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <path id="a" d="M312.675 549.191h183.064v12.926H312.675z" />
                    </defs>
                    <text transform="scale(.26458)" style="line-height:1.25;-inkscape-font-specification:'Segoe UI';white-space:pre;shape-inside:url(#a)" font-weight="400" font-size="17.333" font-family="Segoe UI" letter-spacing="0" word-spacing="0">
                        <tspan x="312.676" y="577.73">
                            <tspan dx="0 6.375 6.2753906 6.7910156 3.2871094 8.9765625 7.03125 10.335938 6.2753906 3.2871094 7.4296875 7.03125 10.335938 7.0546875 2.90625 6.2753906 4.0664062" font-size="12">Seu Nome Completo</tspan>
                        </tspan>
                    </text>
                    <g transform="translate(-76.029 -114.519)">
                        <rect width="61.294" height="38.958" x="76.073" y="114.619" ry="1.849" fill="#4D4D4D" paint-order="stroke markers fill" />
                        <text style="line-height:1.25;-inkscape-font-specification:'Segoe UI'" x="80.439" y="138.621" font-weight="400" font-size="5.306" font-family="Segoe UI" letter-spacing="0" word-spacing="0" fill="#f2f2f2" stroke-width=".995">
                            <tspan x="80.439" y="138.621" class="nume-cart-js">0000 0000 0000 00000</tspan>
                        </text>
                        <text style="line-height:1.25;-inkscape-font-specification:'Segoe UI'" x="80.745" y="148.765" font-weight="400" font-size="4.293" font-family="Segoe UI" letter-spacing="0" word-spacing="0" fill="#f2f2f2" stroke-width=".805">
                            <tspan x="80.745" y="148.765" class="name-sty name-cart-js">Digite Seu Nome</tspan>
                        </text>
                        <path d="M83.5 124.429l-.526.765v4.384l.491.812h1.393l.468-.835v-4.199l-.487-.927zm-2.494.011a.934.934 0 00-.912.936v.959h2.654v-1.175l.546-.72h-2.288zm4.06 0l.485.885v1.01h2.516v-.96a.934.934 0 00-.936-.935zm-4.972 2.15v1.432h2.654v-1.433zm5.457 0v1.432h2.516v-1.433zm-5.457 1.686v1.167c0 .518.418.936.936.936h2.223l-.505-.767v-1.336zm5.457 0v1.312l-.482.79h2.062a.934.934 0 00.936-.935v-1.167z" fill="#ffab00" />
                        <text style="line-height:1.25;-inkscape-font-specification:'Segoe UI'" x="80.928" y="143.24" font-weight="400" font-size="2.746" font-family="Segoe UI" letter-spacing="0" word-spacing="0" fill="gray" stroke-width=".515">
                            <tspan x="80.928" y="143.24">valid</tspan>
                        </text>
                        <path d="M87.172 141.947v.788l.373-.373a.03.03 0 000-.042z" fill="#ff0" paint-order="stroke markers fill" />
                        <text style="line-height:1.25;-inkscape-font-specification:'Segoe UI'" x="88.1" y="143.24" font-weight="400" font-size="2.746" font-family="Segoe UI" letter-spacing="0" word-spacing="0" fill="#f2f2f2" stroke-width=".515">
                            <tspan x="88.1" y="143.24" class="valid-js">05/22</tspan>
                        </text>
                        <text style="line-height:1.25;-inkscape-font-specification:'Segoe UI'" x="121.279" y="143.175" font-weight="400" font-size="2.746" font-family="Segoe UI" letter-spacing="0" word-spacing="0" fill="gray" stroke-width=".515">
                            <tspan x="121.279" y="143.175">CVV</tspan>
                        </text>
                        <path d="M127.523 141.882v.787l.373-.373a.03.03 0 000-.041z" fill="#ff0" paint-order="stroke markers fill" />
                        <text style="line-height:1.25;-inkscape-font-specification:'Segoe UI'" x="128.451" y="143.175" font-weight="400" font-size="2.746" font-family="Segoe UI" letter-spacing="0" word-spacing="0" fill="#f2f2f2" stroke-width=".515">
                            <tspan x="128.451" y="143.175" class="cvv-js">123</tspan>
                        </text>
                    </g>
                    <image width="21.154" height="15.868" preserveAspectRatio="none" xlink:href="<?php esc_html_e($base)  ?>/images/Logo-03.png" x="37.565" y=".006" />
                </svg>

                <div class="space"></div>
                <div class="form required tab-js">
                    <div class="masc-input-js">
                        <p>número do cartão <b>*</b></p>
                        <input class="nm-cart nm-cart-js masc-tab-js" type="text" oninput="numcart(this)" data-js="numeroCartao" placeholder="0000  0000  0000  0000" name="numero_cartao">
                        <p>nome impresso no cartão <b>*</b></p>
                        <input class="nm-cart masc-tab-js" type="text" oninput="namecart(this)" placeholder="Digite Seu Nome Completo" style="text-transform: uppercase;" name="nome_cartao" data-js="nameCartao">
                        <div class="val-cvv">
                            <div class="valid">
                                <p>validade <b>*</b></p>

                                <input class="size-vl-cv dt masc-tab-js" type="text" placeholder="01/21" onkeyup="validcart(this)" data-js="valCartao" name="data_cartao">
                            </div>
                            <div class="cvv">
                                <p>cvv <b>*</b></p>
                                <input class="size-vl-cv cart-cvv val-card masc-tab-js" type="text" oninput="cvvcart(this)" data-js="cvvCartao" name="cvv_cartao">
                            </div>
                        </div>
                    </div>
                    <div class="space-parcela"></div>
                    <p>número de parcelas <b>*</b></p>
                    <?php $card_portion = $SwitchPayData['card_portion']?>
                    <?php $card_description = $SwitchPayData["card_description"]?>
                    <?php $juros = $SwitchPayData['juros'] > 0; ?>
                    <?php $valor = strip_tags($SwitchPayData['total']); ?>
                    <?php $valor = str_replace(['&#36;', 'R$', '$'], '', $valor); ?>
                    <?php $juros_minimo = $SwitchPayData["juros_min"];?>
                    <?php $valor = floatval($valor); ?>
                    <?php
                    $aply_juros = function ($valor, $veses, $porcentagem) {
                        return ($valor * $veses) / 100 / (1 - (1 + $veses / 100) ** -$porcentagem);
                    };
                    function aply_juros_2($valor, $mes, $juros)
                    {
                        return  round(($valor * $juros) / 100 / (1 - (1 + $juros / 100) ** -$mes), 2);
                    }
                    ?>
                    <div class="space-parcela"></div>
                    <select class="parcela-card" name="parcelas_cartao" >
                        <option name="parcelas_cartao" value="1">1x sem juros</option>
                        <?php for ($i = 2; $i <= $SwitchPayData['card_portion']; $i++) { ?>
                            <?php $mim = intval($SwitchPayData['card_min_amout_portion']); ?>
                            
                            <?php $parcel = aply_juros_2($valor, $i, $SwitchPayData['juros']);   ?>
                            <?php if($valor > $mim) { ?>
                            <?php if ($juros_minimo < $i){ ?>                  
                                    <option class="<?php esc_html_e($i)  ?>" name="parcelas_cartao" value="<?php esc_html_e($i)  ?>"><?php esc_html_e($i)  ?>x R$ <?php esc_html_e(number_format($parcel, 2, '.', ','))?></option>
                            <?php } ?>
                            <?php if ($juros_minimo >= $i) { ?>
                              
                                    <option class="<?php esc_html_e($i)  ?>" name="parcelas_cartao" value="<?php esc_html_e($i)  ?>"><?php esc_html_e($i)  ?>x sem juros</option>
                            <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <div class="space"></div>
                    <div class="descricao_cart" <?php esc_html_e(empty($card_description) ? 'hidden' : '')  ?>>
                        <?php esc_html_e($card_description)  ?>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <div hidden>
        <input class="valor-js" type="text" name="payment_type" value="credit">
    </div>

    <div class="space"></div>
    <div class="ativa-2 ativa-tab-js tab_2" hidden>
        <div class="bolet">
            <div class="icons">
                <div class="icons-desc">
                    <div><img class="icons-img" src="<?php esc_html_e($base)  ?>/images/impressora.png">

                    </div>
                    <p>
                        Imprima o boleto e
                        <b>pague no banco.</b>
                        <?php $ticket_discout = $SwitchPayData["ticket_discout"] ?>
                        <?php if (!empty($ticket_discout)) { ?>
                            Ganhe
                            <b> <?php esc_html_e($ticket_discout)  ?>%</b>
                            de desconto utilizando essa forma de pagamento.
                        <?php } ?>
                    </p>
                </div>
                <div class="icons-desc">
                    <div><img class="icons-img" src="<?php esc_html_e($base)  ?>/images/codigo-de-barras.png">
                    </div>
                    <p> <b>ou
                            pague pela internet </b> utilizando<br> o código de barras do boleto</p>
                </div>
                <div class="icons-desc">
                    <div>
                        <img class="icons-img" src="<?php esc_html_e($base)  ?>/images/calendario.png">
                    </div>
                    <p>
                        o prazo de váliade do boleto é de até
                        <b>
                            <?php $ticket_carencia = $SwitchPayData["ticket_carencia"] ?>
                            <?php esc_html_e($ticket_carencia ?? 3)  ?>
                        </b>
                        dias úteis
                    </p>
                </div>
            </div>
        </div>
        <?php $ticket_description = $SwitchPayData["ticket_description"]?>
        <div class="descricao_cart" <?php esc_html_e(empty($ticket_description) ? 'hidden' : '')  ?>>
            <?php esc_html_e($ticket_description)   ?>
        </div>

    </div>
    <div class="ativa-tab-js tab_3" hidden>
        <div class="pix">
            <div class="card-pix">
                <h4>Informações do <b>PIX</b></h4>
                <p>Esta é a forma mais vantajosa para quem deseja comprar a vista.
                    <?php $pix_discount = $SwitchPayData["pix_discount"] ?>
                    <?php if (!empty($pix_discount)) { ?>
                        Ganhe
                        <b> <?php esc_html_e($pix_discount)  ?>%</b>
                        de desconto utilizando essa forma de pagamento.
                    <?php } ?>
                </p>
                <p>O pagamento é instantâneo, prático e pode ser feito em poucos segundos é muito rápido e seguro. </p>
                <p>O que você precisa saber antes de pagar por <b>PIX:</b></p>
                <ul>
                    <li>-Você precisa ter cadastrado uma chave PIX na sua instituição financeira favorita.</li>
                    <li>-Com o seu celular você poderá escanear o QR-code ou copiar o código de pagamento.</li>
                    <li>-O pagamento é processado e debitado do valor disponível na sua conta-corrente.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

