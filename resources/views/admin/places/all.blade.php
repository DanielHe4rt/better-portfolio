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

            <button class="btn btn-primary" id="newPlace">Novo Registro</button>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Empresa</td>
                    <td>Tempo trabalhado</td>
                    <td>Ações</td>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Work::all() as $row)
                    <tr>
                        <form>
                            <td>{{$row->company_name}}</td>
                            <td>{!! $row->worked_time !!}
                            <td>
                                <button type="submit" data-place-id="{{$row->id}}" class="btn btn-warning editPlaceBtn">
                                    Editar
                                </button>
                                <button type="submit" data-place-id="{{$row->id}}"
                                        class="btn btn-danger deletePlaceBtn">Remover
                                </button>
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--
        Modais abaixo
    -->

    <div class="modal" id="placeModal">
        <div class="modal-dialog" role="document">
            <form id="mainForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Deletar Mensagem</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                   aria-describedby="emailHelp"
                                   placeholder="Google">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" class="form-control" id="role" name="role" aria-describedby="emailHelp"
                                   placeholder="Google">
                        </div>
                        <div class="form-group">
                            <label for="description">Comments</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="joined_at">Joined At</label>
                                <input type="date" class="form-control" id="joined_at" name="joined_at"
                                       value="2015-01-01">
                            </div>
                            <div class="col-sm-6">
                                <label for="lefted_at">Lefted At</label>
                                <input type="date" class="form-control" id="lefted_at" name="lefted_at"
                                       value="2016-01-01">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="skills">Roles</label>
                            <select class="selectpicker form-control" name="skills[]" id="skills" multiple>
                                @foreach(\App\Models\Skill\Skill::all() as $skill)
                                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tenho pra caralho</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Deixa quieto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" id="deletePlaceModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deletar Mensagem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cê tem certeza mesmo que quer apagar essa habilidade?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="deleteBtn">Tenho pra caralho</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Deixa quieto</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {


            $("#newPlace").click(function () {
                let places = $('#mainForm');
                let opts = $("#skills").find('option');
                places.trigger('reset');
                places.attr('method', 'POST');
                places.attr('action', '/places');
                $(".filter-option-inner-inner").html('Nothing Selected');
                $("#placeModal").modal('toggle');

                for (let i = 0; i < opts.length; i++) {
                    opts[i].removeAttribute('selected')
                }
            });

            $(".editPlaceBtn").click(function (e) {
                e.preventDefault()
                let places = $('#mainForm');
                let id = $(this).attr('data-place-id');
                places.attr('method', 'PUT');
                places.attr('action', '/places/' + id + "?includes[]=skills");

                $.get(places.attr('action'), function (data) {
                    for (let i in data) {
                        $("#" + i).val(data[i])
                    }
                    let skill = $("#skills");
                    let opts = skill.find('option');
                    let htmlLabel = '';
                    for (let i = 0; i < opts.length; i++) {
                        let skillId = opts[i].getAttribute('value');
                        data.skills.find(skill => {
                            if (skill.id === parseInt(skillId)) {
                                htmlLabel += skill.name + " ";
                                if (!opts[i].getAttribute('selected')) {
                                    return opts[i].setAttribute('selected', '');
                                }
                            }
                        });
                    }
                    $(".filter-option-inner-inner").html(htmlLabel)
                });
                $("#placeModal").modal('toggle');
            });
            $("#mainForm").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function (data) {
                        $(this).trigger('reset');
                        $("#placeModal").modal('toggle');
                        toastr.success('Foi');
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

            $(".deletePlaceBtn").click(function (e) {
                e.preventDefault();
                $("#deleteBtn").attr('data-id', $(this).attr('data-place-id'));
                $("#deletePlaceModal").modal('toggle')
            })
            $("#deleteBtn").click(function (e) {
                e.preventDefault();

                let id = $(this).attr('data-id');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: '/places/' + id,
                    success: function (data) {
                        $(this).trigger('reset');
                        $("#deletePlaceModal").modal('toggle');
                        toastr.success('Deletadissimo');
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
        })
    </script>
@endsection
