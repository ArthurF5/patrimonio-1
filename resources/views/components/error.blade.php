@if ($errors)
	<div class="modal modal-danger {{-- fade --}}" tabindex="-1" role="dialog" data-dismiss="modal" id="error">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">
						Erro
					</h4>
				</div>

				<div class="modal-body">
						{{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
					    <ul >
					        @foreach ($errors as $error)
					            <li>{{ $error }}</li>
					        @endforeach
					    </ul>
					<div class="alert" data-dismiss="alert">
					</div>
				</div>

				<!-- <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div> -->
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endif