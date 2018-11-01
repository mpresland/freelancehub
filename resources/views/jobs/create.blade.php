@extends('layouts.app')
	
@section('content')

	<h2>Create a Job</h2>
	
	{{Form::open(['action' => 'JobsController@store'])}}
	
		<div class="form-group">
			{{Form::label('title','Job Title')}}
			{{Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Job Title'])}}
		</div>
		
		<div class="form-group">
			{{Form::label('description','Job Description')}}
			{{Form::textArea('description','', ['class' => 'form-control', 'placeholder' => 'Job Description'])}}
		</div>
		
		<div class="form-group">
			{{Form::label('budget','Job Budget')}}
			{{Form::number('budget','', ['class' => 'form-control', 'placeholder' => 'Budget - $', 'step' => 'any'])}}
		</div>
	
	
	{{Form::submit('Post Job')}}
	{{Form::close()}}
		
@endsection