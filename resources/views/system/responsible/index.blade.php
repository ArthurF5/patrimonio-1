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

    @component('components.error')
    	@slot('errors', $errors->all())
    @endcomponent

	@if( session('message') )

		<div class="alert alert-{{ session('status') }}">
		    {{ session('message') }}
		</div>


	@endif
	
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Adicionar novo Servidor</h1>
						
				<form action="{{ route('responsibles.store') }}" method="POST">

					{{ csrf_field() }}

					<div class="form-group col-lg-4 {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="responsible-name">Nome: </label>
						<input type="text" name="name" class="form-control" id="responsible-name" autofocus value="{{ old('name') }}">
					</div>

					<div class="form-group col-lg-4 {{ $errors->has('role_id') ? 'has-error' : '' }}">
						<label for="responsible-role">Cargo:</label>
						<select name="role_id" id="responsible-role" class="form-control">
							<option selected disabled>Selecione o cargo</option>
							@foreach($roles as $role)
								<option value="{{ $role->id }}">{{ $role->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group col-lg-4 {{ $errors->has('siape') ? 'has-error' : '' }}">
						<label for="responsible-siape">Siape:</label>
						<input type="text" name="siape" class="form-control" id="responsible-siape" value="{{ old('siape') }}">
						<span class="help-block">
							<span class="label label-primary">* Campo Opcional</span>
						</span>
						
					</div>
					
					<div class="form-group col-lg-12">
						<button type="submit" class="btn btn-default">Salvar</button>							
					</div>

				</form>
			</div>
		</div>
	</div>



@stop
