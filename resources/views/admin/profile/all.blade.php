@extends('layouts.admin')

@section('title','Informações da Pagina')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Nome</td>
                    <td>Conteúdo</td>
                    <td>Ações</td>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Entities\Helpers\Profile::all() as $row)
                    <tr>
                        <form data-profile-id="{{$row->id}}">
                            <td>{{$row->name}}</td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="value" value="{{$row->value}}"/>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="enabled"
                                               type="checkbox" {{$row->enabled ? "checked=" : ""}} value="{{$row->enabled ? 1 : 0}}" >
                                        Option two is disabled
                                    </label>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $("form").submit(function (e) {
                e.preventDefault();
                console.log($(this).serialize());
                let id = $(this).attr('data-profile-id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'PUT',
                    url: '/profile/' + id,
                    data: $(this).serialize(),
                    success: function (data) {
                        toastr.success('Teste');
                    },
                    error: function (err) {
                        let errors = err.responseJSON.errors;
                        for (let i in errors) {
                            let currentError = errors[i];
                            for (let k in currentError) {
                                toastr.error(currentError[k]);
                            }
                        }
                    }
                })
            })
        })
    </script>
@endsection
