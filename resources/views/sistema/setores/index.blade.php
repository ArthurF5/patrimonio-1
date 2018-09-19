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
			<div class="box box-solid box-success">
				<div class="box-header">
					<h1 class="box-title">
						<i class="fa fa-plus"></i> Cadastrar Setor
					</h1>
				</div>
				<div class="box-body">
								
					<form action="{{ route('setores.store') }}" method="POST">

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
			<div class="box box-success box-solid">
				<div class="box-header ">
					<h1 class="box-title">
						<i class="fa fa-list"></i> Lista de Setores	 
					</h1>
				</div>
				<div class="box-body">
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr>
									<th>Nome</th>	
									<th>Descrição</th>	
									<th>Ações</th>		
								</tr>
							</thead>
							<tbody>
								@foreach($setores as $setor)
								<tr>
									<td>{{ $setor->nome }}</td>
									<td>{{ ($setor->descricao) ? $setor->descricao : 'Sem descrição' }}</td>
									<td>
										<button type="button" class="btn btn-sm btn-default" data-toggle="modal"  title="Editar" data-target="#edit-modal-{{ $setor->id }}">
											<i class="fa fa-edit"></i>
										</button>
										@component('components.edit')
											@slot('item', $setor)
											@slot('route', route('setores.update', $setor->id))
										@endcomponent

										<button class="btn btn-sm btn-detail btn-danger" title="Excluir" data-toggle='modal' data-target='#delete-modal-{{ $setor->id }}'>
											<i class="fa fa-trash"></i>
										</button>
										@component('components.delete')
											@slot('item', $setor)
											@slot('route', route('setores.destroy', $setor->id))
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

@endsection
