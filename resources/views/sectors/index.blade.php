@extends('adminlte::page')


@section('content_header')
    <h1>
    	Setores <small>Visão Geral</small>
    </h1>


    <ol class="breadcrumb">
    	<li>
    		<i class="fa fa-home"></i>
    		<a href="{{ route('home') }}">Home</a>
    	</li>
    	<li>
    		<i class="fa fa-building"></i> Setores
    	</li>

    </ol>

@stop

@section('content')

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif


	@if( session('message') )

		<div class="alert alert-{{ session('status') }}">
		    {{ session('message') }}
		</div>


	@endif
	
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Adicionar novo Setor</h1>
						
				<form action="{{ route('setores.store') }}" method="POST">

					{{ csrf_field() }}

					<div class="form-group col-lg-4 {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="sector-name">Nome: </label>
						<input type="text" name="name" class="form-control" id="sector-name" autofocus>
						{{-- @if ($errors->has('name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
                    	@endif --}}
					</div>

					<div class="form-group col-lg-6">
						<label for="sector-description">Descrição: <span class="label label-primary">Opcional</span></label>
						<input type="text" name="description" class="form-control" id="sector-description">
					</div>
					
					<div class="form-group col-lg-12">
						<button type="submit" class="btn btn-default">Salvar</button>							
					</div>

				</form>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<h2>Lista de setores</h2>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Descrição</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sectors as $sector)
						<tr>
							<td>{{ $sector->name }}</td>
							<td>{{ ($sector->description) ? $sector->description : 'Sem descrição' }}</td>
							<td>
								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@stop
