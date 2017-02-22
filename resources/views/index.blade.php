@extends('layout')

@section('title', "Home page")

@section('content')
	@include('admin.blocks.flash')
	<a class="btn btn-primary" href="{{ route('getLogin') }}" >Login</a>
	<a class="btn btn-default" href="{{ route('getRegister') }}" >Register</a>
	<h3>
		@if(Auth::check())
			{{ Auth::user()->name}}
			<a class="btn btn-primary" href="{{ route('getLogout') }}" >Logout</a>
		@endif
	</h3>
@stop