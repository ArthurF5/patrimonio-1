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



	@component('components.create')
		@slot('header', 'Adicionar novo Setor') 
		@slot('route', route('sectors.store'))
	@endcomponent

	@component('components.table')
		@slot('header', ' Lista de setores')
		@slot('titles', ['Nome', 'Descrição', 'Ações'])
		@slot('items', $sectors)
		@slot('fields', ['name', 'description']);
	@endcomponent

	

	

	
	
	

	

@endsection
