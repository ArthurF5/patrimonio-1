@extends('adminlte::page')


@section('content_header')
    <h1>
    	<strong>{{ $setor->nome }}</strong> <small>Lista de materiais cadastrados</small>
    </h1>


    <ol class="breadcrumb">
    	<li>
    		<i class="fa fa-home"></i>
    		<a href="{{ route('home') }}">Home</a>
    	</li>
    	<li>
            <i class="fa fa-building"></i>
            <a href="{{ route('setores.index') }}">Setores
            </a>
    	</li>
        <li class="active">
            <i class="fa fa-list"></i> Lista de materiais
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">

            @if($setor->materiais->isNotEmpty())
                <div class="box box-success">
                    <div class="box-header">
                        <h1 class="box-title">
                            <i class="fa fa-list"></i> Lista de Materiais
                        </h1>

                        <div class="box-tools pull-right">
                            <span class="label label-default">{{ $setor->materiais->count() }} itens cadastrados</span>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tombamento</th>
                                        <th>Responsável</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($setor->materiais as $material)
                                        <tr>
                                            <td>{{ $material->nome }}</td>
                                            <td>{{ $material->tombamento }}</td>
                                            <td>{{ $material->responsavel->nome }}</td>
                                            <td>R$ {{ $material->valor }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                        
                    </div>

                    <div class="box-footer">
                        <h4>
                            <div class="pull-left">
                                <strong>Total:</strong>
                                R$ {{ $setor->materiais->sum('valor') }}
                            </div>
                        </h4>
                    </div>
                    
                </div>
            @else
                <div class="well ">
                    <i class="fa fa-info-circle"></i> Nenhum material encontrado.
                </div>
            @endif

        </div>

        <div class="col-lg-12">
            <a href={{ route('setores.index') }}  class="btn btn-default pull-left">
                Voltar
            </a>
        </div>
    </div>

@stop