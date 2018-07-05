@extends('admin.layout')

@section('content')
	<h1>DashBoard</h1>
	<p>Usuario autenticado: {{ auth()->user()->name }}</p>
@stop