<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" onclick="fechar();"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" ali>Editar sala</h4>
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
                    {!! Form::label('predio', 'Predio:', array('class' => 'col-md-1 control-label')) !!}
                    <div class="col-sm-4">
                        {!! Form::text('predio', Input::old('predio_au'), array('class' => 'form-control', 'placeholder' => 'Nome do prédio')) !!}
                    </div>
                    {!! Form::label('andar', 'Andar do predio:', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-sm-4">
                        {!! Form::text('andar', Input::old('numero'), array('class' => 'form-control', 'placeholder' => 'Andar do prédio')) !!}
                    </div>
                </div>



                <div class="form-group">
                    {!! Form::label('numero', 'Numero:', array('class' => 'col-md-1 control-label')) !!}
                    <div class="col-sm-4">
                        {!! Form::text('numero', Input::old('numero'), array('class' => 'form-control', 'placeholder' => 'Número da aula')) !!}
                    </div>
                    {!! Form::label('capacidade', 'Capacidade:', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-sm-4">
                        {!! Form::text('capacidade', Input::old('capacidade'), array('class' => 'form-control', 'placeholder' => 'Capacidade')) !!}
                    </div>
                </div>



                <div class="form-group">
                    {!! Form::label('tipo', 'Tipo:', array('class' => 'col-md-1 control-label')) !!}
                    <div class="col-sm-4">
                        {!! Form::select('tipo', array('Laboratorio' => 'Laboratorio', 'Auditorio' => 'Auditorio'), 'Laboratorio', array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="modal-footer" align="center">
                        {!! Form::submit('Atualizar', array('class' => 'btn btn-lg btn-success')) !!}
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

