<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden">
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
                            <div class="alert alert-deletar">
                                <ul>
                                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                {!! Form::model($professorEdit, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('professores.update', $professorEdit->id))) !!}
                    @include('professores._form')
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
