<div class="well">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{ $header }}</h1>
					
			<form action="{{ $route }}" method="POST">

				{{ csrf_field() }}

				<div class="form-group col-lg-4 {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name">Nome: </label>
					<input type="text" name="name" class="form-control" id="name" autofocus value="{{ old('name') }}">
				</div>

				<div class="form-group col-lg-6">
					<label for="description">Descrição:</label>
					<input type="text" name="description" class="form-control" id="description" {{ old('description') }}>
					<span class="help-block"><span class="label label-primary">* Campo Opcional</span></span>
				</div>
				
				<div class="form-group col-lg-12">
					<button type="submit" class="btn btn-default">Salvar</button>
				</div>

			</form>
		</div>
	</div>
</div>