const masc = {
    numeroCartao(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{4})(\d)/, '$1   $2')
            .replace(/(\d{4})(\d)/, '$1   $2')
            .replace(/(\d{4})(\d)/, '$1   $2')
            .replace(/(\d{4})\d+?$/, '$1')

    },
    valCartao(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '$1/$2')
            .replace(/(\d{2})(\d)/, '$1')
    },
    cvvCartao(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1')
    }
}