@extends('adminlte::page')


@section('content_header')
    <h1>
    	Materiais <small>Visão Geral</small>
    </h1>


    <ol class="breadcrumb">
    	<li>
    		<i class="fa fa-home"></i>
    		<a href="{{ route('home') }}">Home</a>
    	</li>
    	<li class="active">
    		<i class="fa fa-cubes"></i> Materiais
    	</li>
    </ol>
@stop


@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="box {{ ($errors->isNotEmpty()) ? 'box-danger' : '' }}">
                <div class="box-header">
                    <h1 class="box-title">
                        <i class="fa fa-plus"></i> Cadastrar
                    </h1>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget='collapse'><i class="fa fa-minus"></i></button>
                        
                    </div>
                </div>
                
                <div class="box-body">
                    <form action="{{ route('materiais.store') }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-lg-3 col-md-3 form-group {{ ($errors->has('nome')) ? 'has-error' : '' }} ">
                                <label for="material-nome">Nome: </label>
                                <input type="text" name="nome" id="material-nome" class="form-control" value="{{ old('nome') }}">
                                @if($errors->has('nome'))
                                    <span class="help-block">{{ $errors->first('nome') }}</span>
                                @endif
                            </div>
                            
                            <div class="col-lg-2 col-md-3 form-group {{ ($errors->has('tombamento')) ? 'has-error' : '' }} ">
                                <label for="material-tombamento">Tombamento: </label>
                                <input type="text" name="tombamento" id="material-tombamento" class="form-control" value="{{ old('tombamento') }}">
                                <span class="help-block">
                                    <span class="label label-default">* Opcional</span>

                                </span>
                                @if($errors->has('tombamento'))
                                    <span class="help-block">{{ $errors->first('tombamento') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-2 col-md-3 form-group {{ ($errors->has('setor_id')) ? 'has-error' : '' }}">
                                <label for="material-setor">Setor: </label>
                                <select name="setor_id" id="material-setor" class="form-control select2">
                                    <option selected disabled>Selecione</option>
                                    @foreach($setores as $setor)
                                        <option value="{{ $setor->id }}" {{ old('setor_id') == $setor->id ? 'selected' : '' }}>{{ $setor->nome }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('setor_id'))
                                    <span class="help-block">{{ $errors->first('setor_id') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-2 col-md-3 form-group {{ ($errors->has('responsavel_id')) ? 'has-error' : '' }}">
                                <label for="material-responsavel">Responsavel: </label>
                                <select name="responsavel_id" id="material-responsavel" class="form-control select2">
                                    <option selected disabled>Selecione</option>
                                    @foreach($responsaveis as $responsavel)
                                        <option value="{{ $responsavel->id }}" {{ old('responsavel_id') == $responsavel->id ? 'selected' : '' }}>{{ $responsavel->nome }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('responsavel_id'))
                                    <span class="help-block">{{ $errors->first('responsavel_id') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-3 col-md-3 form-group {{ ($errors->has('valor')) ? 'has-error' : '' }}">
                                <label for="material-valor">Valor: </label>
                                <div class="input-group">
                                    <span class="input-group-addon">R$</span>
                                    <input type="number" name="valor" id="material-valor" class="form-control" step="0.01" value="{{ old('valor') }}" min="0">
                                </div>
                                <span class="help-block">
                                	@if($errors->has('valor'))
                                		<span class="help-block">{{ $errors->first('valor') }}</span>
                            		@endif
                                </span>
                            </div>


                            <div class="col-lg-12 col-md-9 form-group">
                                <label for="material-descricao">Descrição: </label>
                                <input type="text"  name="descricao" id="material-descricao" class="form-control">
                                <span class="help-block">
                                    <span class="label label-default">* Opcional</span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">
                                Cadastrar
                            </button>
                        </div>
                        
                    </form>
                    
                </div>

            </div>
            
        </div>

        <div class="col-lg-12">

            <div class="box box-success collapsed-box">
                <box class="box-header ">
                    <h1 class="box-title">
                        <i class="fa fa-list"></i>
                    </h1>

                    <div class="box-tools pull-right">
                        <span class="label label-default">{{ $materiais->count() }} {{ $materiais->count() > 1 ? 'Cadastrados' : 'Cadastrado' }} </span>
                        <button type="button" class="btn btn-box-tool" data-widget='collapse'><i class="fa fa-plus"></i></button>
                    </div>
                    
                </box>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed data-table">
                            <thead>
                                <tr>
                                    <th>
                                        
                                    </th>
                                    <th>Nome</th>
                                    <th>Tombamento</th>
                                    <th>Valor</th>
                                    <th>Setor</th>
                                    <th>Responsável</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materiais as $material)
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>{{ $material->nome }}</td>
                                    <td>{{ $material->tombamento }}</td>
                                    <td>R$ {{ $material->valor }}</td>
                                    <td>{{ $material->setor->nome }}</td>
                                    <td>{{ $material->responsavel->nome }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-default btn-detail" title="Editar" data-toggle="modal" data-target="#edit-modal-{{ $material->id }}">
                                            <!-- Button trigger modal -->
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        @component('components.form-editar.editar-materiais')
                                            @slot('item', $material)
                                            @slot('setores', $setores)
                                            @slot('responsaveis', $responsaveis)
                                        @endcomponent
                                        
                                        <button class="btn btn-sm btn-detail btn-danger" title="Excluir" data-toggle='modal' data-target='#delete-modal-{{ $material->id }}'>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        @component('components.deletar')
                                            @slot('item', $material)
                                            @slot('route', route('materiais.destroy', $material->id))
                                        @endcomponent
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@stop

@section('js')
    <script type="text/javascript">

        function servidorPorSetor() {
            /*$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });*/

            $.ajax({
                type: "GET",
                url: "{{ route('ajax.servidores.por.setor') }}",
                data: {
                    setor: $("#material-setor").val()
                },
                success: function(data) {

                    var options = `<option selected disabled>Selecione</option>`;

                    $.each(data, function(index, element) {

                        var id = element['id'];
                        var nome = element['nome'];

                        if (id) {
                                options += `<option value='${id}'>${nome}</option>`;
                        } else {
                            options = `<option selected disabled>Nenhum servidor cadastrado no setor</option>`;
                        }

                    });

                    // document.getElementById('material-responsavel').innerHTML = options;
                    // console.log(options);

                },

                error: function(error) {
                    
                },
            });
        }

        $('#material-setor').change(function() {
            servidorPorSetor()
        });
    </script>

@stop