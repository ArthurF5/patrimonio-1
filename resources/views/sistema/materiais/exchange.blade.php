@extends('adminlte::page')


@section('content_header')
    <h1>
    	Materiais <small>Efetuar trocas</small>
    </h1>


    <ol class="breadcrumb">
    	<li>
    		<i class="fa fa-home"></i>
    		<a href="{{ route('home') }}">Home</a>
    	</li>
    	<li>
    		<i class="fa fa-cubes"></i> Materiais
    	</li>
    </ol>
@stop


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="box box-success">
            <div class="box-header">
                <h1 class="box-title">
                    <i class="fa fa-list"></i> Transferência de materiais
                </h1>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                    <form action="{{ route('materiais.change') }}" method="POST" id="modificar-materiais">
                    <table class="table table-hover table-condensed" >
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Tombamento</th>
                                <th>Valor</th>
                            </tr>
                        </thead>

                            @csrf
                            
                            <tbody>
                                @foreach($materiais as $material)
                                    <tr>
                                        <td>{{ $material->nome }}</td>
                                        <td>{{ $material->tombamento }}</td>
                                        <td>R$ {{ $material->valor }}</td>
                                        <input type="hidden" name="materiais[]" value="{{ $material->id }}">
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                <div class="form-group form-inline well">
                    <label for="transferir">Transferir para: </label>
                    <select name="responsavel" id="transferir" class="form-control select2">
                        <option selected disabled></option>
                        @foreach($responsaveis as $responsavel)
                            <option value="{{ $responsavel->id }}">{{ $responsavel->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                        </form>

            <div class="box-footer">
                <a href="{{ url()->previous() }}"  class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Voltar
                </a>
                <button type="submit" class="btn btn-success" form="modificar-materiais">
                    <i class="fa fa-check"></i> Confirmar
                </button>
            </div>
            
        </div>
    </div>
</div>
    

@stop

@section('js')

@stop