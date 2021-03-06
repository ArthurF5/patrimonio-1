<div class="modal fade" tabindex="-1" role="dialog" id="ver-foto-modal-{{ $item->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">
                    {{ $item->nome }}
                </h4>
            </div>

            <div class="modal-body text-center">

                {{ asset($item->imagem) }}
                <img src="{{ $item->imagem }}" alt="">              
            </div>

            <div class="modal-footer">
            	<div class=" text-center">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
            	</div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
