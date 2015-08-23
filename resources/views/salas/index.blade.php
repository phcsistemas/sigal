@extends('layouts.template')

@section('content')

    <section class="wrap">
        <div class="container">
            <button  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                Adicionar nova sala
            </button>

            @include('salas.create')

            <p></p>
            <legend></legend>

        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Salas</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table table-bordered table-hover  table-zebra">
                    <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-controltablepequeno" placeholder="Predio" ></th>
                        <th><input type="text" class="form-controltablepequeno" placeholder="Andar" ></th>
                        <th><input type="text" class="form-controltablepequeno" placeholder="Numero" ></th>
                        <th><input type="text" class="form-controltablepequeno" placeholder="Capacidade" ></th>
                        <th> <div class="form-group">
                                {!! Form::label('tipo', 'Tipo:', array('class' => 'col-md-2 control-label')) !!}
                                <div class="col-sm-4">
                                    {!! Form::select('tipo', array('Laboratorio' => 'Laboratorio', 'Auditorio' => 'Auditorio'), 'Laboratorio', array('class' => 'form-controltablepequeno')) !!}
                                </div>
                            </div></th>

                    </tr>
                    </thead>
                    <tr>
                        <thead>
                        <th >Predio</th>
                        <th>Andar</th>
                        <th>Numero</th>
                        <th>Capacidade</th>
                        <th>Tipo</th>
                        <th>Alocada</th>
                        <th>Opcoes</th>

                        </thead>
                        <tbody>
                    @foreach($salas as $sala)
                        <tr >
                            <td >{{ $sala->predio }}</td>
                            <td>{{ $sala->andar }}</td>
                            <td>{{ $sala->numero }}</td>
                            <td>{{ $sala->capacidade }}</td>
                            <td>{{ $sala->tipo }}</td>
                            @if ($sala->alocada)
                                <td>Sim</td>
                            @else
                                <td>Nao</td>
                            @endif
                            <td align="center">
                                <button class="btn btn-editar  btn-sm" data-toggle="modal"
                                        onclick="editModal({{ $sala->id }})">
                                    <i class="glyphicon glyphicon-pencil"></i>   Editar
                                </button>
                                <button class="btn  btn-deletar  btn-sm" type="button" data-toggle="modal" data-target="#confirmDelete">
                                    <i class="glyphicon glyphicon-trash"></i> Deletar
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @include('salas.delete_confirm')

    <script>
        function editModal(id) {
            $.ajax({
                method: 'get',
                url: '/salas/' + id + '/edit'}).then(function(data) {
                $(data).modal()
            });
        }
    </script>
    <link href="{{ asset('/js/filtro.js') }}" rel="script">
    </div>
    </section>
    <br>
    <div class="rodape">

        <div class="container" >
            <p class ="navbar-text navbar-right">Sistema de Gerenciamento Auditórios e Laboratórios - CEULJI/ULBRA </p>

            <div  class ="navbar-text navbar-left"</div><span class="glyphicon glyphicon-copyright-mark"></span> &nbspCopyright 2015 -<a href="{{ url('/desenvolvedores') }}"> <span style="color: #a7abab" >Desenvolvedores</a></span>

    </div>
@stop