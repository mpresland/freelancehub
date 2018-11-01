@extends('layouts.app')
	
@section('content')

	<h2>Job Details</h2>
	
	{{Form::open(['action' => 'FavouriteController@addFavourite', 'method' => 'POST'])}}
	
		{{Form::hidden('job_id', $Job->id)}}
		{{Form::submit('Add to Favourites', ['class' => 'btn btn-primary'])}}
	
	{{Form::close()}}
	
	<hr>
	
	<h4>{{$Job->title}}</h4>
	<p>Budget: $ {{$Job->budget}}
	<p>{{$Job->description}}
	
	<hr>
	
	<h3>Messages</h3>
	
	@if($UserType == 'Freelancer')
		@if($Threads != false)
			@foreach($Threads as $Thread)
				<a href="/threads/{{$Thread->id}}" class="btn btn-primary">View Conversation</a>
			@endforeach
		@else
			
			{{Form::open(['action' => 'ThreadController@createThread', 'method' => 'POST'])}}
			
				{{Form::hidden('job_id', $Job->id)}}
				{{Form::submit('Send Message', ['class' => 'btn btn-primary'])}}
				
			{{Form::close()}}
			
		@endif
	@endif
	
	@if($UserType == 'Client')
		
		@if(count($Threads) > 0)
			
			@foreach($Threads as $Thread)
				<h4>Participants</h4>
				<ul>
					@if(count($Thread->Users) > 0)
						@foreach($Thread->Users as $ThreadUser)
							<li>{{$ThreadUser->name}}</li>
						@endforeach
					@endif
				</ul>
				<a href="/threads/{{$Thread->id}}" class="btn btn-primary">View Conversation</a>
				
				<hr>
			@endforeach
			
		@else
			<p>No Messages Found
		@endif
	@endif
	
	
@endsection