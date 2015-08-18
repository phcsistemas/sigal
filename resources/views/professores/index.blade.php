@extends('layouts.template')

@section('content')

    <section class="wrap">
        <div class="container">

            <button  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
              Adicionar novo professor
            </button>

            @include('professores.create')

            <p></p>
            <legend></legend>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-male fa-fw"></i>Professores</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>RA</th>
                                <th>Curso</th>
                                <th>CGU</th>
                                <th>Email</th>
                                <th>Fone</th>
                                <th>Opcoes</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($professores as $professor)
                                    <tr>
                                        <td>{{ $professor->nome }}</td>
                                        <td>{{ $professor->ra }}</td>
                                        <td>{{ $professor->curso }}</td>
                                        <td>{{ $professor->cgu }}</td>
                                        <td>{{ $professor->email }}</td>
                                        <td>{{ $professor->fone }}</td>
                                        <td align="center">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    onclick="editModal({{ $professor->id }})">
                                                Editar
                                            </button>
                                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('professores.destroy', $professor->id))) !!}
                                            {!! Form::submit('Deletar', array('class' => 'btn btn-danger btn-xs')) !!}
                                            {!! Form::close() !!}
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
                        url: '/professores/' + id + '/edit'}).then(function(data) {
                        $(data).modal()
                    });
                }
            </script>

        </div>
    </section>
@stop
