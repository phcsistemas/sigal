{{ csrf_field() }}

<div class="form-group">
    {!! Form::label('datepicker', 'Selecione o dia: ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-3">
        {!! Form::text('datepicker', '', array('id' => 'datepicker', 'name' => 'datepicker', 'class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('hora_inicio', 'Hora início: ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-sm-5">
        {!! Form::text('hora_inicio', '', array('id' => 'hora_inicio', 'class' => 'form-control', 'maxlength' => '5')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('hora_fim', 'Hora fim: ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-sm-5">
        {!! Form::text('hora_fim', '', array('class' => 'form-control', 'maxlength' => '5')) !!}
    </div>
</div>

<div class="modal-footer">
    <div align="center">
        {!! Form::submit('OK', array('class' => 'btn btn-lg btn-confirm')) !!}
    </div>
</div>