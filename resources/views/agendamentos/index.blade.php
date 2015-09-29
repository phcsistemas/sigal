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
                hiddenDays: [0],
                aspectRatio: 3.25,
                dayClick: function(date, jsEvent, view) {

                    //alert('Clicked on: ' + date.format());
                    $('#createModal').modal('show');
                }
            });
        });
    </script>
@endsection

@section('content')
    @include('agendamentos.create')
    <div id="calendar"></div>
@endsection