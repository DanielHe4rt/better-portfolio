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
                    <td>Ativo</td>
                </tr>
                </thead>
                <tbody>
                @foreach($fields as $row)
                    <tr>
                        <form data-profile-id="{{$row->id}}">
                            <td>{{$row->name}}</td>
                            <td>
                                @if(strtolower($row->name) == 'about')
                                    <div class="form-group">
                                        <textarea class="form-control" name="value" id="exampleTextarea" rows="3">
                                            {{ $row->value }}
                                        </textarea>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="value" value="{{$row->value}}"/>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="enabled"
                                               type="checkbox" {{$row->enabled ? "checked=" : ""}} value="{{$row->enabled ? 1 : 0}}" >

                                    </label>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Atualizar</button>
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
