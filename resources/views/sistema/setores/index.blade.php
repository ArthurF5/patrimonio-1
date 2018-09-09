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
    	<li class="active">
    		<i class="fa fa-building"></i> Setores
    	</li>

    </ol>

@stop

@section('content')

    @component('components.error')
    	@slot('errors', $errors->all())
    @endcomponent

    @component('components.message')
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
		
		@component('components.create')
			@slot('header', 'Cadastrar Setor') 
			@slot('route', route('setores.store'))
		@endcomponent
	

		@component('components.table')
			@slot('cabecalho', ' Lista de setores')
			@slot('titulos', ['Nome', 'Descrição', 'Ações'])
			@slot('items', $setores)
		@endcomponent

	</div>

@endsection
