{!! csrf_field() !!}

<div class="form-group" >
    {!! Form::label('hora_inicio', 'Hora início: ', array('class' => 'col-md-3 control-label')) !!}

    {!! Form::label('predio', 'Prédio:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-3">
        {!! Form::select('predio_id', $predios, Input::old('predio_id'), array('class' => 'form-control')) !!}
    </div>
    {!! Form::label('sala', 'Sala:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-3">
        {!! Form::select('sala_id', $salas, Input::old('sala_id'), array('class' => 'form-control')) !!}
    </div>
</div>


<div class="modal-footer">
    <div align="center">
        {!! Form::submit('OK', array('class' => 'btn btn-lg btn-confirm')) !!}
    </div>
</div>