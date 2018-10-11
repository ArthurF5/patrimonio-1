<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal-{{ $item->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar </h4>
            </div>

            <div class="modal-body">
                <form action="{{ route('materiais.update', $item->id) }}" method="POST" id="edit-form-{{ $item->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="editar-nome">Nome: </label>
                        <input type="text" id="editar-nome" name="nome" value="{{ $item->nome }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="editar-tombamento">Tombamento: </label>
                        <input type="text" id="editar-tombamento" name="tombamento" value="{{ $item->tombamento }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="editar-valor">Valor: </label>
                        <input type="number" id="editar-valor" name="valor" value="{{ $item->valor }}" class="form-control" step="0.01">
                    </div>

                    <div class="form-group">
                        <label for="editar-setor" class="form-control-label">Setor: </label>
                        <select name="setor_id" id="editar-setor" class="form-control">
                            @foreach($setores as $setor)
                                <option value="{{ $setor->id }}" {{ $setor->id == $item->setor->id ? 'selected' : '' }}>{{ $setor->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editar-responsavel">Responsável: </label>
                        <select name="responsavel_id" id="editar-responsavel" class="form-control">
                            @foreach($responsaveis as $responsavel)
                                <option value="{{ $responsavel->id }}" {{ $responsavel->id == $item->responsavel->id ? 'selected' : '' }}>{{ $responsavel->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editar-descricao">Descricao</label>
                        <input type="text"  name="descricao" id="editar-descricao" class="form-control" value="{{ $item->descricao }}">
                        <span class="help-block">
                            <span class="label label-default">* Opcional</span>
                        </span>
                    </div>

                </form>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="edit-form-{{ $item->id }}">Salvar mudanças</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
