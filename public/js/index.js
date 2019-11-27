$(function() {
  $("[data-toggle='tooltip']").tooltip();
});

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "5000000",
    "hideDuration": "1000000",
    "timeOut": "100000",
    "extendedTimeOut": "50000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$(document).ready(function (){
    $(".form-contact").submit(function(e){
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "/mailer/contact",
            data: $(this).serialize(),
            success: function (data) {
                toastr.success('Mensagem enviada com sucesso! Obrigado <3');
            },
            error: function (err){
                let errors = err.responseJSON.errors;
                for(let i in errors){
                    let currentError = errors[i];
                    for(let k in currentError){
                        toastr.error(currentError[k]);
                    }
                }
            }
        });
    })
});
