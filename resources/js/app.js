/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


$(document).ready(function (event) {

    $(".form-contact").submit(function (e) {
        e.preventDefault();
        window.axios.post('/mailer/contact', $(this).serialize())
            .then(res => {
                toastr.success('Mensagem enviada com sucesso! Obrigado <3');
            })
            .catch(error => {
                errorHandler(error.response.data.errors)
            });

    })
    $(".locale-item").click(function (e) {
        window.axios.post('/locale', {locale: $(this).attr('data-value')}).then(res => {

        })
    })
});


let errorHandler = (err) => {
    for (let i in err) {
        let currentError = err[i];
        for (let k in currentError) {
            toastr.error(currentError[k]);
        }
    }
};
