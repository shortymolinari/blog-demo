@extends('admin.layout')

@section('header')
	<h1>
        POSTS
        <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear publicación</li>
    </ol>
@stop

@section('content')
	<div class="row">
		@if($post->photos->count())
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body">
						{{-- imágenes --}}
					    <div class="row">
					       	@foreach($post->photos as $photo)
					       		<form action="{{ route('admin.photos.destroy', $photo) }}" method="POST">
					       			{{ method_field('DELETE') }}{{ csrf_field() }}
						       		<div class="col-md-3">
						       			<button class="btn btn-danger btn-xs" style="position:absolute">
						       				<i class="fa fa-remove"></i>
						       			</button>
						       			<img src="{{ url('storage/'.$photo->url) }}" class="img-responsive" />
						       		</div>
					       		</form>
					       	@endforeach
					    </div>
					</div>
				</div>
			</div>
		@endif
		<form action="{{ route('admin.posts.update', $post) }}" method="POST">
			{{ csrf_field() }} {{ method_field('PUT') }}
			<div class="col-md-8">
				<div class="box box-primary">
				    <div class="box-body">
				        <div class="form-group {{ $errors->has('title') ? 'has-error': '' }}">
				        	<label for="title">Título de la publicaión</label>
				        	<input type="text" name="title" id="title" class="form-control" placeholder="Titulo de la publicación" value="{{ old('title', $post->title) }}" />
				        	{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
				        </div>

				        <div class="form-group {{ $errors->has('body') ? 'has-error': '' }}">
				        	<label for="body">Contenido de la publicaión</label>
				        	<textarea name="body" id="editor1" class="form-control" placeholder="Ingresa el contenido de la publicación" rows="10">{{ old('body', $post->body) }}</textarea>
				        	{!! $errors->first('body', '<span class="help-block">:message</span>') !!}
				       	</div>

				       	<div class="form-group {{ $errors->has('iframe') ? 'has-error': '' }}">
				        	<label for="iframe">Contenido embedido (iframe)</label>
				        	<textarea name="iframe" id="editor1" class="form-control" placeholder="Ingresa contenido embedido (iframe) de audio o video" rows="2">{{ old('iframe', $post->iframe) }}</textarea>
				        	{!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}
				       	</div>
				    </div>
			    </div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-body">
					
						<div class="form-group">
			                <label>Fecha de publicación</label>
			                <div class="input-group date">
			                  	<div class="input-group-addon">
			                    	<i class="fa fa-calendar"></i>
			                  	</div>
			                	<input class="form-control pull-right" id="datepicker" name="published_at" type="text" value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"  />
			                </div>
			            </div>

						<div class="form-group {{ $errors->has('category_id') ? 'has-error': '' }}">
							<label for="">Categorías</label>
							<select name="category_id" id="category_id" class="form-control select">
								<option value="">Selecciona una categoría</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}"
										{{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
										>{{ $category->name }}</option>
								@endforeach
							</select>
							{!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
						</div>
							
						<div class="form-group {{ $errors->has('tags') ? 'has-error': '' }}">
							<label for="tags">Etiquetas</label>
							<select class="form-control select" name="tags[]" id="tags" multiple="multiple" data-placeholder="Selecciona una o más etiquetas"
                        style="width: 100%;">
				                @foreach($tags as $tag)
				                	<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
				                @endforeach
                			</select>
                			{!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
						</div>	
						
						<div class="form-group {{ $errors->has('excerpt') ? 'has-error': '' }}">
						    <label for="excerpt">Extracto de la publicaión</label>
						    <textarea name="excerpt" id="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación">
						    	{{ old('excerpt', $post->excerpt) }}
						    </textarea>
						    {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
						</div>

						<div class="form-group">
							<div class="dropzone"></div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
@stop

@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css"/>	
	<link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
	 <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css" />
@endpush

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
 	<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 	<!-- CK Editor -->
	<script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
	<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
	<script>
		//Date picker
		$('#datepicker').datepicker({
		    autoclose: true
		});

		//CK Editor
		CKEDITOR.replace('editor1');
		CKEDITOR.config.height = 315;
		$('.select').select2({
			tags: true
		});

		//DropZone
		var myDropzone = new Dropzone('.dropzone', {
			url: '/admin/posts/{{ $post->url }}/photos',
			acceptedFiles: 'image/*',
			maxFilesize: 2, //MB
			//maxFiles: 1,
			paramName: 'photo',
			headers:{
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			dictDefaultMessage: 'Arrasta las fotoa aquí  para subirlas'
		});

		myDropzone.on('error', function(file, res){
			var msg = res.errors.photo[0];
			$('.dz-error-message:last > span').text(msg);
		});

		Dropzone.autoDiscover = false;
	</script>
@endpush