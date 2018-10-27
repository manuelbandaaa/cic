<div class="modal fade " id="modalSelectWinners" tabindex="-1" role="dialog" aria-labelledby="modalSelectWinners"> 
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel" align="center">Escribe el número de Becados a seleccionar</h3> 
            </div> 
            <div class="modal-body"> 
                {!! Form::open(['action' => ['StudentsController@selectWinners'], 'id' => 'winnersForm']) !!}
                {!! Form::text('numWinners', null, array('class' => 'form-control', 'id' => 'numInput')) !!}
                {{ Form::hidden('type', $type) }}
            </div> 
            <div class="modal-footer"> 
                <div class="container-fluid"> 
                    <div class="row"> 
                        <div class="col-sm-12"> 
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <button type="button" id="selectWinners" class="btn btn-primary">
                                Seleccionar Ganadores
                            </button>
                            {!! Form::close() !!}
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
