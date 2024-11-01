function numcart($entrada) {
    if ($entrada.value.length > 1) {
        let $espelho = document.querySelector('.nume-cart-js')
        $entrada.value = masc.numeroCartao($entrada.value)
        $espelho.innerHTML = masc.numeroCartao($entrada.value)

    } else {
        let $espelho = document.querySelector('.nume-cart-js')
        $espelho.innerHTML = '0000 0000 0000 0000'
    }
}

function namecart($entrada) {
    if ($entrada.value.length > 1) {
        let $espelho = document.querySelector('.name-cart-js')
        $espelho.innerHTML = $entrada.value

    } else {
        let $espelho = document.querySelector('.name-cart-js')
        $espelho.innerHTML = 'Digite Seu Nome Completo'
    }
}
function validcart($entrada) {
    if ($entrada.value.length > 1) {
        let $espelho = document.querySelector('.valid-js')
        $entrada.value = masc.valCartao($entrada.value)
        $espelho.innerHTML = masc.valCartao($entrada.value)

    } else {
        let $espelho = document.querySelector('.valid-js')
        $espelho.innerHTML = '05/22'
    }
}

function cvvcart($entrada) {
    if ($entrada.value.length > 1) {
        let $espelho = document.querySelector('.cvv-js')
        $entrada.value = masc.cvvCartao($entrada.value)
        $espelho.innerHTML = masc.cvvCartao($entrada.value)

    } else {
        let $espelho = document.querySelector('.cvv-js')
        $espelho.innerHTML = '123'
    }
}



