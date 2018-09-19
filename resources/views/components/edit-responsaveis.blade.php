<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal-{{ $item->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar </h4>
            </div>

            <div class="modal-body">
                <form action="{{ route('responsaveis.update', $item->id) }}" method="POST" id="edit-form-{{ $item->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="editar-nome">Nome: </label>
                        <input type="text" id="editar-nome" name="nome" value="{{ $item->nome }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="editar-cargo" class="form-control-label">Cargo: </label>
                        <select class="form-control" id="editar-cargo" name="cargo_id">
                            @foreach($cargos as $cargo)
                                <option value="{{ $cargo->id }}" {{ $item->cargo->id == $cargo->id ? 'selected' : ''}}>{{ $cargo->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editar-setor" class="form-control-label">Setor: </label>
                        <select class="form-control" id="editar-setor" name="setor_id">
                            @foreach($setores as $setor)
                            <option value="{{ $setor->id }} {{ $item->id == $setor->id ?'selected' : '' }}">{{ $setor->nome }}</option>

                            @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit-siape">Siape: </label>
                        <input type="text" name="siape" id="edit-siape" value="{{ $item->siape }}" class="form-control">
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
