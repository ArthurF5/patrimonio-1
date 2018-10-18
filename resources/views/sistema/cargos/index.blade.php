@extends('adminlte::page')


@section('content_header')
	<h1>
    	Cargos <small>Visão Geral</small>
    </h1>


    <ol class="breadcrumb">
    	<li>
    		<i class="fa fa-home"></i>
    		<a href="{{ route('home') }}">Home</a>
    	</li>
    	<li class="active">
    		<i class="fa fa-briefcase"></i> Cargos
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

		<div class="col-lg-4 col-md-5">
			<div class="box  {{ ($errors->isNotEmpty()) ? 'box-danger' : '' }}">
				<div class="box-header">
					<h1 class="box-title">
						<i class="fa fa-plus"></i> Cadastrar Cargo
					</h1>
				</div>
				<div class="box-body">
								
					<form action="{{ route('cargos.store') }}" method="POST">

						{{ csrf_field() }}

						<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
							<label for="nome">Nome: </label>
							<input type="text" name="nome" class="form-control" id="nome" autofocus value="{{ old('nome') }}">
							@if($errors->has('nome'))
								<span class="help-block">{{ $errors->first('nome') }}</span>
							@endif
						</div>

						<div class="form-group">
							<label for="descricao">Descrição:</label>
							<input type="text" name="descricao" class="form-control" id="descricao" {{ old('descricao') }}>
							<span class="help-block"><span class="label label-default">* Opcional</span></span>
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

		<div class="col-lg-8 col-md-7">
				<div class="box box-default ">
					<div class="box-header ">
						<h1 class="box-title">
							<i class="fa fa-list"></i> Lista de Cargos
						</h1>
					</div>
					<div class="box-body">
						
						<div class="table-responsive">
							<table class="table table-hover table-condensed">
								<thead>
									<tr>
										<th>Nome</th>	
										<th>Ações</th>	
									</tr>
								</thead>
								<tbody>
									@foreach($cargos as $cargo)
									<tr>
										<td>{{ $cargo->nome }}</td>
										<td>
											<button type="button" class="btn btn-sm btn-default" data-toggle="modal"  title="Editar" data-target="#edit-modal-{{ $cargo->id }}">
											<i class="fa fa-edit"></i>
										</button>
										@component('components.form-editar.editar')
											@slot('item', $cargo)
											@slot('route', route('cargos.update', $cargo->id))
										@endcomponent

										<button class="btn btn-sm btn-detail btn-danger" title="Excluir" data-toggle='modal' data-target='#delete-modal-{{ $cargo->id }}'>
											<i class="fa fa-trash"></i>
										</button>
										@component('components.deletar')
											@slot('item', $cargo)
											@slot('route', route('cargos.destroy', $cargo->id))
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
		
		{{-- @component('components.create')
			@slot('header', 'Cadastrar Cargo')
			@slot('route', route('cargos.store')) 
		@endcomponent

		@component('components.table')
			@slot('cabecalho', ' Lista de Cargos')
			@slot('titulos', ['Nome', 'Descrição', 'Ações'])
			@slot('items', $cargos)
		@endcomponent --}}
	</div>
	

@stop
