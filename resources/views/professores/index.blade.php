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
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($professores as $professores)
                                    <tr>
                                        <td>{{ $professores->nome }}</td>
                                        <td>{{ $professores->ra }}</td>
                                        <td>{{ $professores->curso }}</td>
                                        <td>{{ $professores->cgu }}</td>
                                        <td>{{ $professores->email }}</td>
                                        <td>{{ $professores->fone }}</td>

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
                        url: '/admin/professores/' + id + '/edit'}).then(function(data) {
                        $(data).modal()
                    });
                }
            </script>

        </div>
    </section>
@stop
