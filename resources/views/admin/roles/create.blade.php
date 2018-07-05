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
					<h3 class="box-title">Crear Role</h3>
				</div>
				<div class="box-body">
					
					@include('admin.partials.errors-messages')

					<form method="POST" action="{{ route('admin.roles.store') }}">
						
						@include('admin.roles.form')

						<button class="btn btn-primary btn-block">Crear Role</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection