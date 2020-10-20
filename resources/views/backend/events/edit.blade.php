@extends('layouts.app_admin')
@section('title','Edit Events')
@section('content')
 
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          @if (session('sucessMSG'))
            <div class="alert alert-success">
                {{ session('sucessMSG') }}
            </div>
          @endif


        	<form action="{{ url('admin/events') }}/{{ $objEvent->id }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="topics">Topics</label>
                  <input type="text" class="form-control @error('topics') is-invalid @enderror" id="topics" name="topics"  placeholder="Enter Course topics" value="{{ $objEvent->topics }}">

                  @error('topics')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                 
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $objEvent->description }}</textarea>

                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="source_title">Source Title</label>
                  <input type="text" class="form-control @error('source_title') is-invalid @enderror" id="source_title" name="source_title"  placeholder="Enter Course source_title" value="{{ $objEvent->source_title }}">

                  @error('source_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="source_title_writer">Source Title Writer</label>
                  <input type="text" class="form-control @error('source_title_writer') is-invalid @enderror" id="source_title_writer" name="source_title_writer"  placeholder="Enter Course source_title_writer" value="{{ $objEvent->source_title_writer }}">

                  @error('source_title_writer')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="host">Host</label>
                  <input type="text" class="form-control @error('host') is-invalid @enderror" id="host" name="host"  placeholder="Enter Course host" value="{{ $objEvent->host }}">

                  @error('host')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="location">Location</label>
                  <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location"  placeholder="Enter Course location" value="{{ $objEvent->location }}">

                  @error('location')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website"  placeholder="Enter Course website" value="{{ $objEvent->website }}">

                  @error('website')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="start_date">Start Date</label>
                  <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date"  placeholder="start_date" value="{{ date("Y-m-d\TH:i",strtotime($objEvent->start_date)) }}">

                  @error('start_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="end_date">End Date</label>
                  <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date"  placeholder="end_date" value="{{ date("Y-m-d\TH:i", strtotime($objEvent->end_date)) }}">

                  @error('end_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>
                
             
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </main>
@endsection