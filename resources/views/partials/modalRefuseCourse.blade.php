<div class="modal fade " id="modalRefuseCourse" tabindex="-1" role="dialog" aria-labelledby="modalSelectWinners"> 
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel" align="center">Escribe la razón</h3> 
            </div> 
            <div class="modal-body"> 
                {!! Form::open(['action' => ['PlanningController@sendPlanning', $planning->id, 0]]) !!}
                {!! Form::textarea('obs', null, array('class' => 'form-control')) !!}
            </div> 
            <div class="modal-footer"> 
                <div class="container-fluid"> 
                    <div class="row"> 
                        <div class="col-sm-12"> 
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="refuseCourse" class="btn btn-primary">
                                Aceptar
                            </button>
                            {!! Form::close() !!}
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
