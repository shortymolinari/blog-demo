@extends('admin.layout')

@section('header')
	<h1>
        Permisos
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Permisos</li>
    </ol>
@stop

@section('content')
	<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de Permisos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
	        <table id="permissions-table" class="table table-bordered table-striped">
	            <thead>
		            <tr>
		                <th>ID</th>
		                <th>Identificador</th>
		                <th>Nombre</th>
		                <th>Acciones</th>
		            </tr>
	            </thead>
	            <tbody>
	            	@foreach($permissions as $permission)
		            <tr>
		                <td>{{ $permission->id }}</td>
		                <td>{{ $permission->name }}</td>
		                <td>{{ $permission->display_name }}</td>
		                <td>
		                	@can('update', $permission)
			                	<a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-xs btn-info">
			                		<i class="fa fa-pencil"></i>
			                	</a>
							@endcan
							{{-- @if($permission->id !== 1)
			                	<form method="POST" action="{{ route('admin.permissions.destroy', $permission) }}" style="display: inline;">
			                		{{ csrf_field() }} {{ method_field('DELETE') }}
				                	<button class="btn btn-xs btn-danger" 
				                		onclick="return confirm('¿Estás seguro de querer eliminar este permiso?')">
				                		<i class="fa fa-times"></i>
				                	</button>
			                	</form>
			                @endif --}}
		                </td>
		            </tr>
		            @endforeach
	            </tbody>
	            <tfoot>
		            <tr>
		               <th>ID</th>
		                <th>Identificador</th>
		                <th>Nombre</th>
		                <th>Acciones</th>
		            </tr>
	            </tfoot>
	        </table>
        </div>
        <!-- /.box-body -->
    </div>
@stop


@push('styles')
	<!-- DataTables -->
  	<link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" />
@endpush

@push('scripts')
 	<!-- DataTables -->
	<script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script>
	    $(function () {
		    $('#permissions-table').DataTable({
		      	'paging'      : true,
		      	'lengthChange': true,
		      	'searching'   : true,
		      	'ordering'    : true,
		      	'info'        : true,
		      	'autoWidth'   : true
		    });
		});
	</script>
@endpush