@extends('layouts.master')
@section('content')
<h1>Create User</h1>
<form action="{{route('store-user')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<label>Username</label>
	<input type="text" name="name">
	<label>Email</label>
	<input type="text" name="email">
	<label>password</label>
	<input type="password" name="password">
	<label>Image</label>
	<input type="file" name="image[]"  multiple>
	<button type="submit">create</button>
</form>
@endsection