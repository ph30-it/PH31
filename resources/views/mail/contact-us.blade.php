@extends('layouts.master')
@section('content')

	<h1>Contact Us</h1>
	<form action="{{route('send-mail-contact')}}" method="POST">
		@csrf
		<label for="email">Your Email</label>
		<input id="email" type="text" name="email">
		<label for="content">Content</label>
		<textarea id="content" name="content"></textarea>
		<button type="submit">Send</button>		
	</form>
@endsection