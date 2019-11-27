<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/admin/adminlte.css')}}">
    <link rel="stylesheet" href="{{url('css/admin/all.min.css')}}">
    <link rel="stylesheet" href="{{url('css/toastr.css')}}">


    <title>Bootstrap 4 Login/Register Form</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <h3 class="text-center">Cantinho mágico do danielcoração</h3>
            <form id="form-login">
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Entrar</h1>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required=""
                       autofocus="">
                <hr>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="">
                <hr>
                <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Entrar
                </button>
            </form>
        </div>
    </div>
    <br>
</div>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    $(document).ready(function () {
        $('#form-login').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{route('auth-login')}}',
                data: formData,
                success: function (data) {
                    toastr.success('Logado com sucesso! Bem vindo bb');
                    window.location.href= "{{route('admin-dashboard')}}"
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
    })
</script>
</body>
</html>
