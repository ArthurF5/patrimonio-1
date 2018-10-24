<div class="modal" tabindex="-1" role="dialog" id="cadastrar-materiais-modal">
    
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Cadastrar novo item</h4>
            </div>

            <div class="modal-body">

                <form action="{{ route('materiais.store') }}" id="cadastrar-materiais-form" method="POST">
                    
                    @csrf

                    <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                        <label for="cadastrar-materiais-nome">Nome:</label>
                        <input type="text" name="nome" id="cadastrar-materiais-nome" class="form-control" value="{{ old('nome') }}">
                        @if($errors->has('nome'))
                            <span class="help-block">
                                {{ $errors->first('nome') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('tombamento') ? 'has-error' : '' }}">
                        <label for="cadastrar-materiais-tombamento">Tombamento:</label>
                        <input type="text" name="tombamento" id="cadastrar-materiais-tombamento" class="form-control" value="{{ old('tombamento') }}">
                        <span class="help-block">
                            <span class="label label-default">* Opcional</span>

                        </span>
                        @if($errors->has('tombamento'))
                            <span class="help-block">
                                {{ $errors->first('tombamento') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }}">
                        <label for="cadastrar-materiais-valor">Valor:</label>
                        <div class="input-group">
                            <span class="input-group-addon">R$</span>
                            <input type="number" name="valor" id="cadastrar-materiais-valor" class="form-control" step="0.01" value="{{ old('valor') }}" min="0">
                        </div>
                        @if($errors->has('valor'))
                            <span class="help-block">
                                {{ $errors->first('valor') }}
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                        <label for="cadastrar-materiais-descricao">Descricao:</label>
                        <input type="text" name="descricao" id="cadastrar-materiais-descricao" class="form-control">
                        <span class="help-block">
                            <span class="label label-default">* Opcional</span>                            
                        </span>
                        @if($errors->has('descricao'))
                            <span class="help-block">
                                {{ $errors->first('descricao') }}
                            </span>
                        @endif
                    </div>

                    <input type="hidden" value="{{ $responsavel->setor->id }}" name="setor_id">
                    <input type="hidden" value="{{ $responsavel->id }}" name="responsavel_id">

                    {{-- <div class="form-group {{ $errors->has('setor_id') ? 'has-error' : '' }}">
                        <label for="cadastrar-materiais-setor">Setor: </label>
                        <select name="setor_id" id="cadastrar-materiais-setor" class="form-control" readonly>
                            <option value="{{ $responsavel->setor->id }}" selected>{{ $responsavel->setor->nome }}</option>
                        </select>
                        @if($errors->has('setor_id'))
                            <span class="help-block">
                                {{ $errors->first('setor_id') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('responsavel_id') ? 'has-error' : '' }}">
                        <label for="cadastrar-materiais-responsavel">Responsável: </label>
                        <select name="responsavel_id" id="cadastrar-materiais-responsavel" class="form-control" readonly>
                            <option value="{{ $responsavel->id }}" selected>{{ $responsavel->nome }}</option>
                        </select>
                        @if($errors->has('responsavel_id'))
                            <span class="help-block">
                                {{ $errors->first('responsavel_id') }}
                            </span>
                        @endif
                    </div> --}}





                </form>
                
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="cadastrar-materiais-form">Salvar mudanças</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@section('js')
    @if($errors->isNotEmpty())
        <script>
            $(document).ready(() => {
                $('#cadastrar-materiais-modal').modal('show')

                $('#cadastrar-materiais-modal').on('shown.bs.modal', function () {
                    $('#cadastrar-materiais-nome').focus()
                });
            })

        </script>
    @endif

    <script>
        $('#cadastrar-materiais-modal').on('shown.bs.modal', function () {
            $('#cadastrar-materiais-nome').focus()
        });
    </script>
@stop