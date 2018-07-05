@extends('admin.layout')

@section('header')
	<h1>
        Usuarios
        <small>Crear usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-list"></i> Usuarios</a></li>
        <li class="active">Crear usuario</li>
    </ol>
@stop

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Datos personales</h3>
				</div>
				<div class="box-body">
					
					@include('admin.partials.errors-messages')

					<form method="POST" action="{{ route('admin.users.store') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="name">Nombre:</label>
							<input type="text" name="name" value="{{ old('name') }}" class="form-control">
						</div>

						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="text" name="email" value="{{ old('email') }}" class="form-control">
						</div>
						
						<div class="form-group col-md-6">
							<label>Roles</label>
							@include('admin.roles.checkboxes')
						</div>
						<div class="form-group col-md-6">
							<label>Permisos</label>
							@include('admin.permissions.checkboxes', ['model' => $user])
						</div>
						
						<span class="help-block"> La contraseña será generada y enviada al nuevo usurio vía email</span>
						<button class="btn btn-primary btn-block">Crear usuario</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection