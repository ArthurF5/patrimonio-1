<div class="modal fade" tabindex="-1" role="dialog" id="delete-modal-{{ $item->id }}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">
					<i class="fa fa-warning text-danger fa-2x"></i>
                </h4>
            </div>

            <div class="modal-body text-center">
            	<h3>Deseja realmente excluir <small>{{ $item->nome }}</small>?</h3>
            	
                <form action="{{ $route }}" method="POST" id="delete-form-{{ $item->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
                
            </div>

            <div class="modal-footer">
            	<div class=" text-center">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	                <button type="submit" class="btn btn-danger" form="delete-form-{{ $item->id }}">Confirmar</button>
            	</div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
