<div class="row">
	<div class="col-lg-12">
		<h2>{{ $header }}</h2>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						@foreach($titles as $title)
							<th>{{ $title }}</th>
						@endforeach
					</tr>
				</thead>
				<tbody>
					@foreach($items as $item)
					<tr>
						<td>{{ $item->name }}</td>
						<td>{{ ($item->description) ? $item->description : 'Sem descrição' }}</td>
						<td>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>