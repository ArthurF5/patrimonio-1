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

    @component('components.error')
    	@slot('errors', $errors->all())
    @endcomponent
	


	@if(session('message') )
		@component('components.alert')
			@slot('status', session('status'))
			@slot('message', session('message'))
		@endcomponent
	@endif

	<div class="row">
		
		@component('components.create')
			@slot('header', 'Cadastrar Cargo')
			@slot('route', route('cargos.store')) 
		@endcomponent

		@component('components.table')
			@slot('cabecalho', ' Lista de Cargos')
			@slot('titulos', ['Nome', 'Descrição', 'Ações'])
			@slot('items', $cargos)
		@endcomponent
	</div>
	

@stop
