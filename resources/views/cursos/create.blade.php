<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" align="center">
    <div class="modal-dialog">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastro de Cursos</h4>
            </div>

        <div class="modal-body col-sm-pull-0">
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

                {!! Form::open(array('route' => 'cursos.store', 'class' => 'form-horizontal')) !!}

                <div class="form-group">
                    {!! Form::label('nome', 'Nome:', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('nome_curso', Input::old('nome_curso'), array('class' => 'form-control', 'placeholder' => 'Nome do curso')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Coordenador', 'Coord.:', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('coordenador', Input::old('coordenador'), array('class' => 'form-control', 'placeholder' => 'Nome do coordenador')) !!}
                    </div>
                </div>

            <div class="form-group">
                {!! Form::label('fone', 'Fone:', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-sm-9">
                    {!! Form::text('fone', Input::old('fone'), array('class' => 'form-control', 'placeholder' => '(xx)-xxxx-xxxx')) !!}
                </div>
            </div>




                <div class="form-group">
                    <div align="center">
                        {!! Form::submit('Cadastrar', array('class' => 'btn btn-lg btn-primary')) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
