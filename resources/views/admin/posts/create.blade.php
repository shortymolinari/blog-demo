<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<form action="{{ route('admin.posts.store', '#create') }}" method="POST">
				{{ csrf_field() }}
			  	<div class="modal-dialog" role="document">
				    <div class="modal-content">
				      	<div class="modal-header">
				        	<h5 class="modal-title" id="exampleModalLabel">Agrega el titulo de tu nueva publicación</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          	<span aria-hidden="true">&times;</span>
					        </button>
				      	</div>
				      	<div class="modal-body">
				        	<div class="form-group {{ $errors->has('title') ? 'has-error': '' }}">
				        		{{-- <label for="title">Título de la publicaión</label> --}}
				        		<input type="text" name="title" id="post-title" class="form-control" placeholder="Titulo de la publicación" value="{{ old('title') }}" autofocus="autofocus"  />
				        		{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
				        	</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        	<button class="btn btn-primary">Crear Publicación</button>
				      	</div>
				    </div>
			  	</div>
			</form>
		</div>
		
		@push('scripts')
			<script>
	            if(window.location.hash === "#create"){
	                $('#exampleModal').modal('show');
	            }

	            $('#exampleModal').on('hide.bs.modal', function(){
	                window.location.hash = '#';
	            });

	             $('#exampleModal').on('shown.bs.modal', function(){
	                $('#post-title').focus();
	                window.location.hash = '#create';
	            });
        	</script>
		@endpush
