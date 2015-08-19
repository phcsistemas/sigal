<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" onclick="fechar();"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar professor</h4>
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

                {!! Form::model($professorEdit, array(
                    'class' => 'form-horizontal',
                    'method' => 'PATCH',
                    'route' => array('professores.update', $professorEdit->id))) !!}

                <div class="form-group">
                    {!! Form::label('nome', 'Nome:', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('nome', Input::old('nome_au'), array('class' => 'form-control', 'placeholder' => 'Nome do professor')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Curso', 'RA:', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('ra', Input::old('ra'), array('class' => 'form-control', 'placeholder' => 'RA')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('curso', 'Curso:', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::select('curso_id', $cursos, Input::old('curso_id'), array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('cgu', 'CGU:', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('cgu', Input::old('cgu'), array('class' => 'form-control', 'placeholder' => 'CGU')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email:', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('fone', 'Fone:', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('fone', Input::old('fone'), array('class' => 'form-control', 'placeholder' => '(xx)-xxxx-xxxx')) !!}
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
