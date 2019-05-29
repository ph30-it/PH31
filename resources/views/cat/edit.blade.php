@extends('layouts.master')
@section('content')
	<form action="{{route('update-cat', $cat->id)}}" method="POST">
	@csrf
	@method('PUT')
		<div class="form-group">
			<label>Cat Name:</label>
			<input type="text" name="name" value="{{$cat->name}}">
		</div>
		<div class="form-group">
			<label>Age:</label>
			<input type="text" name="age" value="{{$cat->age}}">
		</div>
		<div class="form-group">
			<select name="breed_id">
				@foreach( $listBreeds as $breed)
					<option value="{{$breed->id}}" {{$breed->id == $cat->breed_id ? 'selected' : '' }}>{{$breed->name}}</option>
				@endforeach
				
			</select>
		</div>
		<button type="submit">Update</button>
	</form>

@endsection