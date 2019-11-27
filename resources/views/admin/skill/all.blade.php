@extends('layouts.admin')

@section('title','Minhas Habilidades')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <button class="btn btn-primary" id="btnCreateSkill">Nova habilidade</button>
            </div>
        </div>
        <div class="card">

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Nome</td>
                    <td>Tipo</td>
                    <td>Tempo</td>
                    <td>Ações</td>
                    </th>
                </thead>
                <tbody>
                @foreach(\App\Entities\Skill\Skill::all() as $skill)
                    <tr>
                        <td>{{$skill->name}}</td>
                        <td>{{$skill->type->name}}</td>
                        <td>{{$skill->time->name}}</td>
                        <td>
                            <button class="btn btn-primary editSkillBtn" data-skill-id="{{$skill->id}}">Editar</button>
                            <button class="btn btn-danger deleteSkillBtn" data-skill-id="{{$skill->id}}">Remover</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="createSkillModal">
        <form id="formCreateSkill">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nova Habilidade</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="staticSkillName" class="col-form-label">Skill</label>
                            <input type="text" class="form-control" name="name" id="staticSkillName"
                                   placeholder="PHP/JS/Qlqrmerda">
                        </div>
                        <div class="form-group">
                            <label for="staticSkillType">Tipo de habilidade</label>
                            <select class="form-control" id="staticSkillType" name="type_id">
                                @foreach(\App\Entities\Skill\Type::all() as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="staticSkillTime">Tempo de Habilidade</label>
                            <select class="form-control" id="staticSkillTime" name="time_id">
                                @foreach(\App\Entities\Skill\Time::all() as $time)
                                    <option value="{{$time->id}}">{{$time->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="staticSkillComment">Comentário sobre a habilidade</label>
                            <textarea class="form-control" id="staticSkillComment" name="comment" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="btnCreateSkill">Criar nova
                            habilidade
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal" id="editSkillModal">
        <form id="formUpdateSkill">
            <input type="hidden" name="id" id="skillId">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="skillName" class="col-form-label">Skill</label>
                            <input type="text" class="form-control" name="name" id="skillName"
                                   placeholder="PHP/JS/Qlqrmerda">
                        </div>
                        <div class="form-group">
                            <label for="staticSkillType">Tipo de habilidade</label>
                            <select class="form-control" id="staticSkillType" name="type_id">
                                <option id="skillType"></option>
                                <option disabled></option>
                                @foreach(\App\Entities\Skill\Type::all() as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="staticSkillTime">Tempo de Habilidade</label>
                            <select class="form-control" id="staticSkillTime" name="time_id">
                                <option id="skillTime"></option>
                                <option disabled></option>
                                @foreach(\App\Entities\Skill\Time::all() as $time)
                                    <option value="{{$time->id}}">{{$time->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="skillComment">Comentário sobre a habilidade</label>
                            <textarea class="form-control" id="skillComment" name="comment" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="btnRead">Editar Habilidade</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal" id="deleteSkillModal">
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
                    <button type="button" class="btn btn-primary" id="deleteBtn">Tenho pra caralho</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Deixa quieto</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#btnCreateSkill").click(function () {
                $("#createSkillModal").modal('toggle');
            });

            $(".editSkillBtn").click(function (e) {
                e.preventDefault();
                let id = $(this).attr('data-skill-id');
                $("#skillId").val(id);
                console.log(id);
                $.get('/skills/' + id + "?includes[]=type&includes[]=time", function (data) {
                    $("#skillId").val(id);
                    $("#skillName").val(data.name);
                    $("#skillType").val(data.type_id).html(data.type.name);
                    $("#skillTime").val(data.time_id).html(data.time.name);
                    $("#skillComment").val(data.comment);
                    $("#editSkillModal").modal('toggle');
                })
            });

            $("#formUpdateSkill").submit(function (e) {
                e.preventDefault();
                let id = $("#skillId").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'PUT',
                    url: '/skills/' + id,
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
            });

            $("#formCreateSkill").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/skills',
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
            });

            $(".deleteSkillBtn").click(function(){
                $("#deleteBtn").val($(this).attr('data-skill-id'));
                $("#deleteSkillModal").modal('toggle');
            })

            $("#deleteBtn").click(function(){
                let id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: '/skills/' + id,
                    data: $(this).serialize(),
                    success: function (data) {
                        toastr.success('Habilidade deletada!');
                        $("button[data-skill-id='"+id+"']").closest('tr').hide();
                        $("#deleteSkillModal").modal("toggle")
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

