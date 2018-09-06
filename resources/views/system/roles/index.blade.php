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
	


	@if(session('message') )
		@component('components.alert')
			@slot('status', session('status'))
			@slot('message', session('message'))
		@endcomponent
	@endif

	@component('components.create')
		@slot('header') Cadastrar Cargo @endslot
		@slot('route') {{ route('roles.store') }} @endslot
	@endcomponent

	@component('components.table')
		@slot('header', ' Lista de Cargos')
		@slot('titles', ['Nome', 'Descrição', 'Ações'])
		@slot('items', $roles)
	@endcomponent
	

@stop
