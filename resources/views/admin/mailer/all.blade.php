@extends('layouts.admin')

@section('title','Minhas Mensagens')
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
                <th>
                <td>Data</td>
                <td>Assunto</td>
                <td>Status</td>
                <td>Ações</td>
                </th>
                </thead>
                <tbody>
                @foreach($mails as $mail)
                    <th>
                    <td>{{\Carbon\Carbon::parse($mail->created_at)->format('d/m/Y H:i:s')}}</td>
                    <td>{{$mail->subject}}</td>
                    <td>
                        <span class="badge badge-{{$mail->status->type}}">{{$mail->status->name}}</span>
                    </td>
                    <td>
                        @if($mail->status_id < 3)
                            <button class="btn btn-default readMessage" id="{{$mail->id}}">Ler mensagem</button>
                        @endif
                        <button class="btn btn-danger deleteMessage" id="{{$mail->id}}">Apagar</button>
                    </td>
                    </th>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="readMailModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="mailId" value="">
                    <p>
                        <span id="name"> </span> (<span id="email"></span>)
                    </p>
                    <h3 id="subject"></h3>
                    <p id="content">

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block" id="btnRead">Marcar como lido</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="deleteMailModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deletar Mensagem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cê tem certeza mesmo que quer apagar essa mensagem?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="deleteBtn" mailid="">Tenho pra caralho</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Deixa quieto</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".readMessage").click(function () {
                let id = $(this).attr('id');
                $.get('/mailer/' + id, function (data) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'PUT',
                        url: '/mailer/' + data.id,
                        data: {
                            status_id: 2
                        },
                        success: function (data) {
                            toastr.success('Mensagem visualizada!')
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
                    $("#mailId").val(id);
                    for (let i in data) {
                        $("#" + i).html(data[i]);
                    }
                    $("#readMailModal").modal('toggle')
                });
            });

            $("#btnRead").click(function (e) {
                e.preventDefault();
                let id = $("#mailId").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'PUT',
                    url: '/mailer/' + id,
                    data: {
                        status_id: 3
                    },
                    success: function (data) {
                        toastr.success('Mensagem respondida!')
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
            });

            $(".deleteMessage").click(function () {
                let id = $(this).attr('id');
                $("#deleteBtn").attr('mailId', id);
                $("#deleteMailModal").modal('toggle');
            });

            $("#deleteBtn").click(function (e) {
                e.preventDefault()
                let id = $(this).attr('mailId');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: '/mailer/' + id,
                    success: function (data) {
                        toastr.success('Mensagem deletada!');
                        $("#" + id).closest('tr').hide();
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
        });
    </script>
@endsection

