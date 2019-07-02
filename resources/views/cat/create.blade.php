@extends('layouts.master')

@section('content')
	<form action="{{route('cats.store')}}" method="POST">
	@csrf
	  <div class="form-group">
	    <label for="name">Name Cat:</label>
	    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
	    <span id="error-name"></span>
	    @if ($errors->has('name'))
	    	<p style="color: red;">{{$errors->first('name')}}</p>
	    @endif
	  </div>
	  <div class="form-group">
	    <label for="age">Age:</label>
	    <input type="text" class="form-control" id="age" name="age" value="{{old('age')}}">
	    <span id="error-age"></span>
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
	    <span id="error-breed-id"></span>
	    @if ($errors->has('breed_id'))
	    	<p style="color: red;">{{$errors->first('breed_id')}}</p>
	    @endif
	 
	  </div>
	  <p id="submit" class="btn btn-default">Submit</p
	  	>
	</form>
<script type="text/javascript">
	$(document).ready(function(){
		$('#submit').click(function(){
			$.ajax({
				url: '/api/cats',
				type: 'POST',
				data: $("form").serialize(),
				success : function(result){
					console.log(result);

				},
				error: function(reject){
                    var errors = $.parseJSON(reject.responseText);
                    // console.log(reject);
                    if (errors.name.length){
                    	$('#error-name').html(errors.name[0]);
                    }
                    if(errors.age.length){
                    	$('#error-age').html(errors.age[0]);
                    }
                    if(errors.breed_id.length){
                    	$('#error-breed-id').html(errors.breed_id[0]);
                    }



                    // $.each(errors, function (key, val) {
                    // 	console.log(key,val);
                    // //     // $("#" + key + "_error").text(val[0]);
                    // });
                
				}


			})

		})

	})
</script>
@endsection