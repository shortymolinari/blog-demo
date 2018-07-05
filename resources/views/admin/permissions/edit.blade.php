@extends('admin.layout')

@section('header')
	<h1>
        Permisos
        <small>Editar permisos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.permissions.index') }}"><i class="fa fa-list"></i> Permisos</a></li>
        <li class="active">Actualizar permiso</li>
    </ol>
@stop

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Actualizar permiso</h3>
				</div>
				<div class="box-body">
					
					@include('admin.partials.errors-messages')

					<form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
						
						{{ method_field('PUT') }}
						{{ csrf_field() }} 

						<div class="form-group">
							<label for="name">Identificador:</label>
							<input type="text" value="{{ $permission->name }}" class="form-control" disabled>
						</div>
												
						<div class="form-group">
							<label for="display_name">Nombre:</label>
							<input type="text" name="display_name" value="{{ old('display_name', $permission->display_name) }}" class="form-control">
						</div>

						<button class="btn btn-primary btn-block">Actualizar permiso</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection