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
        <ul class="list-group">
            @foreach($materiais as $material)
                <li class="list-group-item">{{ $material->nome }}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-lg-12 text-center">
        <h1>
            Para: <br>
            <select name="" id="" class="form-control">
                <option selected disabled></option>
                @foreach($responsaveis as $responsavel)
                    <option value="{{ $responsavel->id }}">{{ $responsavel->nome }}</option>
                @endforeach
            </select>
        </h1>
        
    </div>
</div>
    

@stop

@section('js')

@stop