<div class="col-lg-8 col-md-7">
		<div class="box box-success box-solid">
			<div class="box-header ">
				<h1 class="page-header">
					<i class="fa fa-list"></i> {{ $cabecalho }} 
				</h1>
			</div>
			<div class="box-body">
				
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								@foreach($titulos as $titulo)
									<th>{{ $titulo }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@foreach($items as $item)
							<tr>
								<td>{{ $item->nome }}</td>
								<td>{{ ($item->descricao) ? $item->descricao : 'Sem descrição' }}</td>
								<td>
									<button class="btn btn-sm btn-default" title="Editar">
										<i class="fa fa-edit"></i>
									</button>
									<button class="btn btn-danger btn-sm" title="Excluir">
										<i class="fa fa-trash"></i>
									</button>							
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>