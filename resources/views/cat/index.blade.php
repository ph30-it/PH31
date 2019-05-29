@extends('layouts.master')
@section('content')
<div id="breed"></div>
 <table class="table table-striped">
 	<thead>
 		<tr>
 			<td> Cat ID:</td>
 			<td>Cat Name:</td>
 			<td>Cat Age : </td>
 			<td>Breed Name: </td>
 			<td>Created At</td>
 			<td>Updated At</td>
 			<td>Deleted At</td>
 			<td>Action</td>
 		</tr>
 	</thead>
 	<tbody>
 		@foreach( $listCats as $cat)
 			<tr id="{{$cat->id}}">
 				<td>{{$cat->id}}</td>
 				<td>{{$cat->name}}</td>
 				<td>{{$cat->age}}</td>
 				<td>{{$cat->breed->name}}</td>
 				<td>{{$cat->created_at}}</td>
 				<td>{{$cat->updated_at}}</td>
 				<td>{{$cat->deleted_at}}</td>
 				<td>
 					<a href="{{route('edit-cat', $cat->id)}}" class="btn btn-primary">Edit</a>
 					<form action="{{route('delete-cat', $cat->id)}}" method="POST">
 						@csrf
 						@method('DELETE')
 						<button type="submit" class="btn btn-danger">Delete</button>
 						
 					</form>
 				</td>
 			</tr>
 		@endforeach
 	</tbody>
 </table>
 
<script type="text/javascript">
	$(document).ready(function (){
		$('tr').click( function () {

			var idcat = $(this).attr('id');
			$.ajax({
				url : 'api/cats/'+idcat+'/breeds',
				method : 'GET',
				data : {},
				success : function(result) {
					// console.log(result);
					var breedinfo= '';
					breedinfo+= '<h1> Breed name : '+ result.name+'</h1>';
					breedinfo+= '<h1> Created : '+ result.created_at+'</h1>';
					$('#breed').html('');
					$('#breed').append(breedinfo);
				}

			});
			// console.log(html);
			// alert($(this).text());

		})
//code
	});

</script>
@endsection