@extends('layouts.master')
@section('content')
	<h1>Set role for user : {{$user->name}}</h1>
	<p>Please select role :</p>
	<form action="{{route('store-role-user', $user->id)}}" method="POST">
		@csrf
		@foreach($roles as $role)
			@php
				$flag = in_array($role->id, $listUserRoles);
			@endphp
			<input type="checkbox" name="role_id[]" value="{{$role->id}}" {{ $flag == true ? 'checked' : '' }} ><span>{{$role->name}}</span>

		@endforeach
		<button type="submit">Add</button>
	</form>
@endsection