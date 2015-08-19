@extends('layouts.template')

@section('content')

    <section class="wrap">
        <div class="container">

            <button  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
              Adicionar novo Curso
            </button>

            @include('cursos.create')

            <p></p>
            <legend></legend>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-male fa-fw"></i>Cursos</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Coordenador</th>
                                <th>Fone</th>
                                <th>Opcoes</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cursos as $curso)
                                    <tr>
                                        <td>{{ $curso->nome_curso }}</td>
                                        <td>{{ $curso->coordenador }}</td>
                                        <td>{{ $curso->fone }}</td>
                                        <td align="center">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    onclick="editModal({{ $curso->id }})">
                                                Editar
                                            </button>
                                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('cursos.destroy', $curso->id))) !!}
                                            {!! Form::submit('Deletar', array('class' => 'btn btn-danger btn-xs')) !!}
                                            {!! Form::close() !!}
                                            <button class="btn btn-danger btn-xs" onclick="confirmDelete()">Deletar</button>
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
