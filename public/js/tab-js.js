function ativa(num, $el) {
    
    switch (num) {
        case 1:
            document.querySelector(".valor-js").value = 'credit'
            break;
            case 2:
                document.querySelector(".valor-js").value = 'boleto'
                break;
                case 3:
                    document.querySelector(".valor-js").value = 'PIX'
                    break;
        default:
            document.querySelector(".valor-js").value = 'credit'
            break;

    }
    hidden_ativa(num)
    active_image($el)
    document.querySelector(`.ativa-${num}`).removeAttribute('hidden')
}

function active_image($el){
    document.querySelectorAll('.tab-img-js').forEach($img => {
        $img.classList.remove('tab-btn-none')
        
        })
        $el.classList.add('tab-btn-none')

}


function hidden_ativa(num) {


    document.querySelectorAll('.ativa-tab-js').forEach($ativa => {
        $ativa.setAttribute('hidden', '')
    })
    document.querySelector(`.tab_${num}`).removeAttribute('hidden')
}