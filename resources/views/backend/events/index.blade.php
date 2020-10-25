@extends('layouts.app_admin')
@section('title','Show Events')
@section('content')
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	@if (session('sucessMSG'))
	            <div class="alert alert-success">
	                {{ session('sucessMSG') }}
	            </div>
          	@endif

        	<a href="{{ url('admin/events/create') }}" class="btn btn-primary">Add Event +</a>
        	 
          	<h2>Events</h2>
          	<div class="table-responsive">
	            <table class="table table-striped table-sm">
	              <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>Topics</th>
	                  	<th>Description</th>
	                  	<th>Source Title</th>
	                  	<th>Source Title Writer</th>
	                  	<th>Host</th>
	                  	<th>Location</th>
	                  	<th>Website</th>
	                  	<th>Start At</th>
	                  	<th>End At</th>
	                  	<th>Speakers</th>
	                  	<th>Photos</th>
	                  	<th>Registrations</th>
	                  	<th>Actions</th>
	                </tr>
	              </thead>
	              <tbody>
	                 
	                @foreach($arrEvents as $objEvent)
	                <tr>
	                  	<td>{{ $objEvent->id }}</td>
	                  	<td>{{ $objEvent->topics }}</td>
	                  	<td>{{ $objEvent->description }}</td>
	                  	<td>{{ $objEvent->source_title }}</td>
	                  	<td>{{ $objEvent->source_title_writer }}</td>
	                  	<td>{{ $objEvent->host }}</td>
	                  	<td>{{ $objEvent->location }}</td>
	                  	<td>{{ $objEvent->website }}</td>
	                  	<td>{{ $objEvent->start_date }}</td>
	                  	<td>{{ $objEvent->end_date }}</td>


	                  	<td><a class="btn btn-primary" href="{{ url('admin/eventspeakers') }}/{{ $objEvent->id }}"> Speakers </a></td>

	                  	<td><a class="btn btn-secondary" href="{{ url('admin/eventphotos') }}/{{ $objEvent->id }}"> Photos </a></td>

	                  	<td><a class="btn btn-secondary" href="{{ url('admin/eventregistrations') }}/{{ $objEvent->id }}"> Registrations </a></td>
	                  	 
	                  	<td>
	                  		<a class="btn btn-primary" href="{{ url('admin/events/') }}/{{ $objEvent->id }}/edit"> Edit </a>
	                  		<a class="btn btn-secondary" href="{{ url('admin/events/') }}/{{ $objEvent->id }}"> Show </a>
	                  		<form action="{{ url('admin/events') }}/{{ $objEvent->id }}" method="post" enctype="multipart/form-data">
	                  			<button type="submit" class="btn btn-danger">Delete</button>
	                  			@method('delete')
	                  			@csrf
	                  		</form>
	                  	</td>
	                </tr>
	                @endforeach


	              </tbody>
	            </table>
          	</div>
        </main>
@endsection