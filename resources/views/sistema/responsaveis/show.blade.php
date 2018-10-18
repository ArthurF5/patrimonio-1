@extends('adminlte::page')


@section('content_header')
    <h1>
    	<strong>{{ $responsavel->nome }}</strong>
    </h1>


    <ol class="breadcrumb">
    	<li>
    		<i class="fa fa-home"></i>
    		<a href="{{ route('home') }}">Home</a>
    	</li>
    	<li>
            <i class="fa fa-users"></i>
            <a href="{{ route('responsaveis.index') }}"> Servidores
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

            @if($responsavel->materiais->isNotEmpty())
                <div class="box box-success">
                    <div class="box-header">
                        <h1 class="box-title">
                            <i class="fa fa-list"></i> Lista de Materias
                        </h1>

                        <div class="box-tools pull-right">
                            <span class="label label-default">{{ $responsavel->materiais->count() }} itens cadastrados</span>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tombamento</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($responsavel->materiais as $material)
                                        <tr>
                                            <td>{{ $material->nome }}</td>
                                            <td>{{ $material->tombamento }}</td>
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
                                R$ {{ number_format($responsavel->materiais->sum('valor'), 2, ',','.') }}
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
            <a href={{ route('responsaveis.index') }}  class="btn btn-default pull-left">
                Voltar
            </a>
        </div>
    </div>

@stop