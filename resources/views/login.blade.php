@extends('layout')

@section('title', "Login")


@section('content')
<form  method="post">
	@include('admin.blocks.flash')
	@include('admin.blocks.errors')
	{{ csrf_field() }}
	<div class="col-md-offset-4 col-md-4">
		<div class="form-group">
			<h1 align="center">Đăng nhập</h1>
		</div>
		<div class="col-md-offset-1 col-md-10">
			<div class="form-group" >
			  <label>Tên Đăng Nhập:</label>
			  <input type="text" class="form-control" id="user" placeholder="Nhập tên đăng nhập" name="username" value="{{ old('username') }}">
			</div>
			<div class="form-group">
			  <label>Mật Khẩu:</label>
			  <input type="password" class="form-control" id="pass" placeholder="Nhập mật khẩu" name="password">
			</div>
			<div class="form-group">
	    	<input type="submit" class="btn btn-primary  col-md-5" value="Đăng nhập">
	    	<a href="{{ route('getRegister') }}" type="button" class="btn btn-default col-md-offset-2 col-md-5" >Register</a>
		</div>
		</div>
		

		
		
	</div>  
</form>
@stop

