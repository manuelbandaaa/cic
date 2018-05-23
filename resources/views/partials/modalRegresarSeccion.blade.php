<div class="modal fade " id="modalRegresarSeccion" tabindex="-1" role="dialog" aria-labelledby="modalRegresarSeccion"> 
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel" align="center">Escribe el motivo por el cuál se regresará la sección a edición</h3> 
            </div> 
            <div class="modal-body"> 
                {!! Form::open(['action' => ['SeccionesController@regresarEdicion', $seccion->id]]) !!}
                {!! Form::textarea('obs', null, array('class' => 'form-control')) !!}
            </div> 
            <div class="modal-footer"> 
                <div class="container-fluid"> 
                    <div class="row"> 
                        <div class="col-sm-3 col-sm-offset-9"> 
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            {!! Form::submit('Enviar', array('class' => 'btn btn-primary')) !!}
                            {!! Form::close() !!}
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
