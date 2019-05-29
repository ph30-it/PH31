@extends('layouts.master')

@section('content')
	<form action="{{route('cats.store')}}" method="POST">
	@csrf
	  <div class="form-group">
	    <label for="name">Name Cat:</label>
	    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
	    @if ($errors->has('name'))
	    	<p style="color: red;">{{$errors->first('name')}}</p>
	    @endif
	  </div>
	  <div class="form-group">
	    <label for="age">Age:</label>
	    <input type="text" class="form-control" id="age" name="age" value="{{old('age')}}">
	    @if ($errors->has('age'))
	    	<p style="color: red;">{{$errors->first('age')}}</p>
	    @endif
	  </div>
	  <div class="form-group">
	    <label for="breed">Breed ID:</label>
	    <select name="breed_id" id="breed">
	    	@foreach ($listBreed as $breed)
	    		<option value="{{$breed->id}}"> {{ $breed->name }}</option>

	    	@endforeach
	    </select>
	    @if ($errors->has('breed_id'))
	    	<p style="color: red;">{{$errors->first('breed_id')}}</p>
	    @endif
	 
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>

@endsection