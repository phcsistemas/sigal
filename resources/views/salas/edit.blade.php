<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" onclick="fechar();"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar sala</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                {!! Form::model($salaEdit, array(
                    'class' => 'form-horizontal',
                    'method' => 'PATCH',
                    'route' => array('salas.update', $salaEdit->id))) !!}

                <div class="form-group">
                    {!! Form::label('predio', 'Predio:', array('class' => 'col-md-4 control-label')) !!}
                    <div class="col-sm-3">
                        {!! Form::text('predio', Input::old('predio_au'), array('class' => 'form-control', 'placeholder' => 'Nome do prédio')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('andar', 'Andar do predio:', array('class' => 'col-md-4 control-label')) !!}
                    <div class="col-sm-3">
                        {!! Form::text('andar', Input::old('numero'), array('class' => 'form-control', 'placeholder' => 'Andar do prédio')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('numero', 'Numero da sala:', array('class' => 'col-md-4 control-label')) !!}
                    <div class="col-sm-3">
                        {!! Form::text('numero', Input::old('numero'), array('class' => 'form-control', 'placeholder' => 'Número da aula')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('capacidade', 'Capacidade:', array('class' => 'col-md-4 control-label')) !!}
                    <div class="col-sm-3">
                        {!! Form::text('capacidade', Input::old('capacidade'), array('class' => 'form-control', 'placeholder' => 'Capacidade')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('tipo', 'Tipo:', array('class' => 'col-md-4 control-label')) !!}
                    <div class="col-sm-7">
                        {!! Form::select('tipo', array('Laboratorio' => 'Laboratorio', 'Auditorio' => 'Auditorio'), 'Laboratorio') !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>

                    <div class="col-sm-10">
                        {!! Form::submit('Atualizar', array('class' => 'btn btn-lg btn-primary')) !!}
                    </div>
                </div>

                {!! Form::close() !!}

                <script>
                    function fechar(){
                        $('.modal-backdrop').fadeOut(500);
                        $('.modal-backdrop .in').fadeOut(500);
                    }
                </script>

            </div>

        </div>
    </div>
</div>

