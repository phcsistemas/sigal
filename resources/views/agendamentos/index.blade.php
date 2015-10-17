@extends('layouts.template')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.css') }}">
@endsection

@section('script')
    <script src="{{ asset('/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/bower_components/fullcalendar/dist/lang/pt-br.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                editable: true,
                //hiddenDays: [0], oculta o Domingo
                aspectRatio: 3.25,

                dayClick: function(date, jsEvent, view) {
                    var moment = $('#calendar').fullCalendar('getDate');

                    //o usuario nao precisa reservar a sala para o passado ;)
                    if (date.format() < moment.format('YYYY-MM-DD')) {
                        alert('Você não pode reservar neste dia!');
                    }
                    else {
                        //passa para o form a data e a hora
                        $('#myModalLabel').text('Data: ' + date.format('DD/MM/YYYY'));
                        $('#horaId').text(date.format('HH:MM'));

                        $('#createModal').modal('show');
                    }
                }
            });
        });
    </script>
@endsection

@section('content')
    @include('agendamentos.create')
    <div id="calendar"></div>
@endsection