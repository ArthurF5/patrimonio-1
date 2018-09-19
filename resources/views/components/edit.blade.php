<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal-{{ $item->id }}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar</h4>
            </div>

            <div class="modal-body">

                <form action="{{ $route }}" method="POST" id="edit-form-{{ $item->id }}">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nome" class="form-control-label">Nome: </label>
                        <input type="text" name="nome" value="{{ old('nome', $item->nome) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="descricao" class="form-control-label">Descrição: </label>
                        <input type="text" name="descricao" value="{{ old('descricao', $item->descricao) }}" class="form-control">
                    </div>



                </form>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary pull-right" form="edit-form-{{ $item->id }}">
                    Salvar mudanças
                </button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
