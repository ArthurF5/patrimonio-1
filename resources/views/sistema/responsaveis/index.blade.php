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
		<div class="col-lg-12">
			<div class="box {{ ($errors->isNotEmpty()) ? 'box-danger' : '' }}">
				<div class="box-header">
					<h1 class="box-title">
						<i class="fa fa-user-plus"></i> Cadastrar
					</h1>
					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget='collapse'><i class="fa fa-minus"></i></button>
						
					</div>
				</div>
				
				<div class="box-body">
					<form action="{{ route('responsaveis.store') }}" method="POST">

						@csrf

						<div class="row">
							<div class="col-lg-3 col-md-3 form-group {{ ($errors->has('nome')) ? 'has-error' : '' }} ">
								<label for="responsavel-nome">Nome: </label>
								<input type="text" name="nome" id="responsavel-nome" class="form-control" value="{{ old('nome') }}">
								@if($errors->has('nome'))
									<span class="help-block">{{ $errors->first('nome') }}</span>
								@endif
							</div>

							<div class="col-lg-3 col-md-3 form-group {{ ($errors->has('cargo_id')) ? 'has-error' : '' }}">
								<label for="resposavel-cargo">Cargo: </label>
								<select name="cargo_id" id="resposavel-cargo" class="form-control">
									<option selected disabled>Selecione o cargo </option>
									@foreach($cargos as $cargo)
										<option value="{{ $cargo->id }}" {{ old('cargo_id') == $cargo->id ? 'selected' : '' }}>{{ $cargo->nome }}</option>
									@endforeach
								</select>
								@if($errors->has('cargo_id'))
									<span class="help-block">{{ $errors->first('cargo_id') }}</span>
								@endif
							</div>

							<div class="col-lg-3 col-md-3 form-group {{ ($errors->has('setor_id')) ? 'has-error' : '' }}">
								<label for="resposavel-setor">Setor: </label>
								<select name="setor_id" id="resposavel-setor" class="form-control">
									<option selected disabled>Selecione o setor</option>
									@foreach($setores as $setor)
										<option value="{{ $setor->id }}" {{ old('setor_id') == $setor->id ? 'selected' : '' }}>{{ $setor->nome }}</option>
									@endforeach
								</select>
								@if($errors->has('setor_id'))
									<span class="help-block">{{ $errors->first('setor_id') }}</span>
								@endif
							</div>

							<div class="col-lg-3 col-md-3 form-group {{ ($errors->has('siape')) ? 'has-error' : '' }}">
								<label for="responsavel-siape">Siape: </label>
								<input type="text" name="siape" id="responsavel-siape" class="form-control" value="{{ old('siape') }}">
								@if($errors->has('siape'))
									<span class="help-block">{{ $errors->first('siape') }}</span>
								@endif
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
			<div class="box box-success">
				<box class="box-header ">
					<h1 class="box-title">
						<i class="fa fa-list"></i>
					</h1>

					<div class="box-tools pull-right">
						<span class="label label-default">{{ $usuarios->count() }}</span>
					</div>
				</box>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Cargo</th>
									<th>Setor</th>
									<th>Siape</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($usuarios as $usuario)
								<tr>
									<td>{{ $usuario->nome }}</td>
									<td>{{ $usuario->cargo->nome }}</td>
									<td>{{ $usuario->setor->nome }}</td>
									<td>{{ ($usuario->siape) ? $usuario->siape : 'NÃO CADASTRADO' }}</td>
									<td>
										<a href="{{ route('responsaveis.show', $usuario->id) }}" class="btn btn-sm btn-default">
											<i class="fa fa-cubes"></i> Materiais
										</a>

										<button class="btn btn-sm btn-default btn-detail" title="Editar" data-toggle="modal" data-target="#edit-modal-{{ $usuario->id }}">
											<!-- Button trigger modal -->
											<i class="fa fa-edit"></i>
										</button>
										@component('components.form-editar.editar-responsaveis')
											@slot('item', $usuario)
											@slot('cargos', $cargos)
											@slot('setores', $setores)
										@endcomponent
										
										<button class="btn btn-sm btn-detail btn-danger" title="Excluir" data-toggle='modal' data-target='#delete-modal-{{ $usuario->id }}'>
											<i class="fa fa-trash"></i>
										</button>
										@component('components.deletar')
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


