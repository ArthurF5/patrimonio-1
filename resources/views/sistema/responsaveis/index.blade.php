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
							@if($errors->has('nome'))
								<span class="help-block">{{ $errors->first('nome') }}</span>
							@endif
						</div>

						<div class="form-group {{ ($errors->has('cargo_id')) ? 'has-error' : '' }}">
							<label for="resposavel-cargo">Cargo: </label>
							<select name="cargo_id" id="resposavel-cargo" class="form-control select2">
								<option selected disabled>Selecione o cargo </option>
								@foreach($cargos as $cargo)
									<option value="{{ $cargo->id }}" {{ old('cargo_id') == $cargo->id ? 'selected' : '' }}>{{ $cargo->nome }}</option>
								@endforeach
							</select>
							@if($errors->has('cargo_id'))
								<span class="help-block">{{ $errors->first('cargo_id') }}</span>
							@endif
						</div>

						<div class="form-group {{ ($errors->has('siape')) ? 'has-error' : '' }}">
							<label for="responsavel-siape">Siape: </label>
							<input type="text" name="siape" id="responsavel-siape" class="form-control" value="{{ old('siape') }}">
							@if($errors->has('siape'))
								<span class="help-block">{{ $errors->first('siape') }}</span>
							@endif
							<span class="help-block">
								<span class="label label-default">* Opcional</span>
							</span>
						</div>

						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-save"></i> Cadastrar
							</button>
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
						<table class="table table-hover table-condensed">
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
									<td>
										<button class="btn btn-sm btn-default btn-detail" title="Editar" data-toggle="modal" data-target="#edit-modal-{{ $usuario->id }}">
											<!-- Button trigger modal -->
											<i class="fa fa-edit"></i>
										</button>
										@component('components.edit-responsaveis')
											@slot('item', $usuario)
											@slot('cargos', $cargos)
										@endcomponent
										
										<button class="btn btn-sm btn-detail btn-danger" title="Excluir" data-toggle='modal' data-target='#delete-modal-{{ $usuario->id }}'>
											<i class="fa fa-trash"></i>
										</button>
										@component('components.delete')
											@slot('item', $usuario)
											@slot('route', route('responsaveis.destroy', $usuario->id))
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


