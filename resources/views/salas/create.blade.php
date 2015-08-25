<!-- Modal -->
<div class="modal fade " id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden">
    <div class="modal-dialog  col-sm-push-0" >
        <div  class="modal-content " >
            <div class="modal-content " >
                <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" onclick="fechar();"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span>
                </button>


                <h4 class="modal-title" id="myModalLabel">Cadastro de Salas</h4>
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

                {!! Form::open(array('style' => 'display: inline-block;','route' => 'salas.store', 'class' => 'form-horizontal')) !!}
                    @include('salas._form')
                {!! Form::close() !!}

                <script>
                    function fechar(){
                        $('.modal-backdrop').fadeOut(5000);
                        $('.modal-backdrop .in').fadeOut(5000);
                    }
                </script>

            </div>
        </div>
    </div>
    </div>
</div>
