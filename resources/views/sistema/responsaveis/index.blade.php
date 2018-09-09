@extends('adminlte::page')


@section('content_header')
    <h1>
    	Servidores <small>Visão Geral</small>
    </h1>


    <ol class="breadcrumb">
    	<li>
    		<i class="fa fa-home"></i>
    		<a href="{{ route('home') }}">Home</a>
    	</li>
    	<li class="active">
    		<i class="fa fa-users"></i> Servidores
    	</li>

    </ol>

@stop

@section('content')

    @component('components.error')
    	@slot('errors', $errors->all())
    @endcomponent

	@if(session('message'))
		<div class="alert alert-{{ session('status') }}" data-dismiss="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times</span>
			</button>
		    {{ session('message') }}
		</div>
	@endif

	<div class="row">
		<div class="col-lg-4 col-md-6">
			<div class="box box-solid box-success">
				<div class="box-header">
					<h1 class="page-header">
						<i class="fa fa-user-plus"></i> Cadastrar Servidor
					</h1>
				</div>
				
				<div class="box-body">
					<form action="{{ route('responsaveis.store') }}" method="POST">

						{{ csrf_field() }}

						<div class="form-group {{ ($errors->has('nome')) ? 'has-error' : '' }} ">
							<label for="responsavel-nome">Nome: </label>
							<input type="text" name="nome" id="responsavel-nome" class="form-control" autofocus value="{{ old('nome') }}">
						</div>

						<div class="form-group {{ ($errors->has('cargo_id')) ? 'has-error' : '' }}">
							<label for="resposavel-cargo">Cargo: </label>
							<select name="cargo_id" id="resposavel-cargo" class="form-control">
								<option selected disabled>Selecione o cargo </option>
								@foreach($cargos as $cargo)
									<option value="{{ $cargo->id }}" {{ old('cargo_id') == $cargo->id ? 'selected' : '' }}>{{ $cargo->nome }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group {{ ($errors->has('siape')) ? 'has-error' : '' }}">
							<label for="responsavel-siape">Siape: </label>
							<input type="text" name="siape" id="responsavel-siape" class="form-control" value="{{ old('siape') }}">
							<span class="help-block">
								<span class="label label-default">* Opcional</span>
							</span>
						</div>

						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary btn-sm">Salvar</button>
						</div>
						
					</form>
					
				</div>

			</div>
		</div>

		<div class="col-lg-8 col-md-6">
			<div class="box box-solid box-success">
				<box class="box-header">
					<h1 class="page-header">
						<i class="fa fa-list"></i> Lista de Servidores Cadastrados
					</h1>
				</box>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Cargo</th>
									<th>Siape</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($usuarios as $usuario)
								<tr>
									<td>{{ $usuario->nome }}</td>
									<td>{{ $usuario->cargo->nome }}</td>
									<td>{{ ($usuario->siape) ? $usuario->siape : 'NÃO CADASTRADO' }}</td>
									<td></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>


	</div>

	{{-- <div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Cargo</th>
							<th>Siape</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->role->name }}</td>
							<td><span class="label label-default">{{ ($user->siape) ? $user->siape : 'Não cadastrado' }}</span></td>
							<td>
								<button class="btn btn-sm btn-default">
									<i class="fa fa-search"></i>
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div> --}}



@stop
