@extends('layouts.template')

@section('content')

    <section class="wrap">
        <div class="container">

            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                Adicionar nova sala
            </button>


            @include('salas.create')

            <p></p>
            <legend></legend>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-male fa-fw"></i>{{ $message }}</h3>
                </div>
            </div>
    </section>
@endsection