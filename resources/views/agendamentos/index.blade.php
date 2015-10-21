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
            var calendar = $('#calendar');
            calendar.fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'agendaWeek',
                businessHours: {
                    start: '07:00',
                    end: '23:00'
                },
                minTime: '07:00',
                maxTime: '22:30',
                editable: false,
                hiddenDays: [0], //oculta o Domingo
                aspectRatio: 3.25,

                /* o formato da hora de inicio e fim do Fullcalendar é a seguinte
                 '2015-12-31T12:30:00'
                 por isso é chamado $agenda['dia']T$agenda['hora']
                 */
                events: [
                    @foreach($agendamentos as $agenda)
                        {
                            title: '{{ $agenda['tipo'] }} - {{ $profs->get($agenda['prof_id']) }}',
                            start: '{{ $agenda['dia'] }}T{{ $agenda['hora_inicio'] }}',
                            end: '{{ $agenda['dia'] }}T{{ $agenda['hora_fim'] }}'
                        },
                    @endforeach
                    ],

                dayClick: function(date) {
                    var moment = calendar.fullCalendar('getDate');

                    //o usuario nao precisa reservar a sala para o passado ;)
                    if (date.format() < moment.format('YYYY-MM-DD')) {
                        alert('Você não pode reservar neste dia!');
                    }
                    else {
                        var view = calendar.fullCalendar('getView');

                        //verifica se o calendario está no modo mês
                        if (view.name == 'month') {
                            calendar.fullCalendar('changeView', 'agendaDay');
                            calendar.fullCalendar('gotoDate', date);
                        } else {
                            //passa o dia para um campo hidden para depois guardar no banco
                            $('#dia').val(date.format('YYYY-MM-DD'));

                            //passa para o form a data e a hora
                            $('#myModalLabel').text('Data: ' + date.format('DD/MM/YYYY'));
                            $('#horaId').val(date.format('HH:mm'));

                            $('#createModal').modal('show');
                        }
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