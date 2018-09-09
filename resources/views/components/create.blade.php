<div class="col-lg-4 col-md-5">
	<div class="box box-solid box-success">
		<div class="box-header">
			<h1 class="page-header">
				<i class="fa fa-plus"></i> {{ $header }}
			</h1>
		</div>
		<div class="box-body">
						
			<form action="{{ $route }}" method="POST">

				{{ csrf_field() }}

				<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
					<label for="nome">Nome: </label>
					<input type="text" name="nome" class="form-control" id="nome" autofocus value="{{ old('nome') }}">
				</div>

				<div class="form-group">
					<label for="descricao">Descrição:</label>
					<input type="text" name="descricao" class="form-control" id="descricao" {{ old('descricao') }}>
					<span class="help-block"><span class="label label-default">* Opcional</span></span>
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