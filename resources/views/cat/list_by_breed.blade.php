@extends('layouts.master')
@section('content')

	<h1>List all cat by breed : {{$listCats[0]->breed->name}}</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<td> ID</td>
				<td>Cat Name</td>
				<td>Age</td>
				<td>Breed ID</td>
			</tr>
		</thead>
		<tbody>
			@foreach($listCats as $cat)
				<tr>
					<td>{{$cat->id}}</td>
					<td>{{$cat->name}}</td>
					<td>{{$cat->age}}</td>
					<td>{{$cat->breed_id}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection