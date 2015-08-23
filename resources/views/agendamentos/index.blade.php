@extends('layouts.template')

@section('content')

    <section class="wrap">
        <div class="container">

            <button  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
              Adicionar novo Agendamento
            </button>



            <p></p>
            <legend></legend>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-male fa-fw"></i>Agendamentos</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Professor</th>
                                <th>Criado por</th>
                                <th>Sala</th>
                                <th>Tipo</th>
                                <th>Descricao</th>
                                <th>Dia</th>
                                <th>Horario de Inicio</th>
                                <th>Horario Fim</th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach($agendamentos as $agendamento)
                                    <tr>
                                        <td>{{ $professor[$agendamento->prof_id] }}</td>
                                        <td>{{ $usuario[$agendamento->usuario_id] }}</td>
                                        <td>{{ $sala[$agendamento->sala_id] }}</td>
                                        <td>{{ $agendamento->tipo }}</td>
                                        <td>{{ $agendamento->descricao }}</td>
                                        <td>{{ $agendamento->dia }}</td>
                                        <td>{{ $agendamento->hora_inicio }}</td>
                                        <td>{{ $agendamento->hora_fim }}</td>
                                        <td align="center">
                                            <button class="btn btn-editar btn-sm" data-toggle="modal"
                                                    onclick="editModal({{ $agendamento->id }})">
                                                <i class="glyphicon glyphicon-pencil"></i>  Editar
                                            </button>
                                            <button class="btn btn-deletar btn-sm" type="button" data-toggle="modal" data-target="#confirmDelete">
                                                <i class="glyphicon glyphicon-trash"></i> Deletar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <script>
                function editModal(id) {
                    $.ajax({
                        method: 'get',
                        url: '/cursos/' + id + '/edit'}).then(function(data) {
                        $(data).modal()
                    });
                }
            </script>

        </div>
    </section>
@stop
