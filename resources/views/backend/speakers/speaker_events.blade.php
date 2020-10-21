@extends('layouts.app_admin')
@section('title','Show Speaker Events')
@section('content')
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	@if (session('sucessMSG'))
	            <div class="alert alert-success">
	                {{ session('sucessMSG') }}
	            </div>
          	@endif

        	<form action="{{ url('admin/eventspeakers') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Event  Topic</label>
                   

                  <select name="event_id"  class="form-control @error('event_id') is-invalid @enderror">
                      <option value="">Select Event</option>
                      @foreach($arrEvents as $objEvent)
                        <option value="{{ $objEvent->id }}">{{ $objEvent->topics }}</option>
                      @endforeach
                  </select>

 

                  @error('event_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <input type="hidden" name="speaker_id" value="{{ $speaker_id }}">
 
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        	 
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
	                  	<th>Actions</th>
	                </tr>
	              </thead>
	              <tbody>
	                 
	                @foreach($arrSpeakerEvents as $objSpeakerEvent)
	                <tr>
	                  	<td>{{ $objSpeakerEvent->id }}</td>
	                  	<td>{{ $objSpeakerEvent->topics }}</td>
	                  	<td>{{ $objSpeakerEvent->description }}</td>
	                  	<td>{{ $objSpeakerEvent->source_title }}</td>
	                  	<td>{{ $objSpeakerEvent->source_title_writer }}</td>
	                  	<td>{{ $objSpeakerEvent->host }}</td>
	                  	<td>{{ $objSpeakerEvent->location }}</td>
	                  	<td>{{ $objSpeakerEvent->website }}</td>
	                  	<td>{{ $objSpeakerEvent->start_date }}</td>
	                  	<td>{{ $objSpeakerEvent->end_date }}</td>
	                  	 
	                  	 
	                  	<td>
	                  		 
	                  		<form action="{{ url('admin/speakerevents') }}/{{ $speaker_id }}/{{ $objSpeakerEvent->id }}" method="post" enctype="multipart/form-data">
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