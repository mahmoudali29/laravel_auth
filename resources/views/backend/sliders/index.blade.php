@extends('layouts.app_admin')
@section('title','Show Sliders')
@section('content')
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	@if (session('sucessMSG'))
	            <div class="alert alert-success">
	                {{ session('sucessMSG') }}
	            </div>
          	@endif

        	<a href="{{ url('admin/sliders/create') }}" class="btn btn-primary">Add Slider +</a>
        	 
          	<h2>Sliders</h2>
          	<div class="table-responsive">
	            <table class="table table-striped table-sm">
	              <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>Title1</th>
	                  	<th>Title2</th>
	                  	<th>Description</th>
	                  	<th>Image</th>
	                  	<th>Actions</th>
	                </tr>
	              </thead>
	              <tbody>
	                 
	                @foreach($arrSliders as $objSlider)
	                <tr>
	                  	<td>{{ $objSlider->id }}</td>
	                  	<td>{{ $objSlider->title1 }}</td>
	                  	<td>{{ $objSlider->title2 }}</td>
	                  	<td>{{ $objSlider->description }}</td>
	                  	<td><img style="width: 100px;height: 100px;" src="{{ url('') }}/{{ $objSlider->image }}"></td>
	                  	<td>
	                  		<a class="btn btn-primary" href="{{ url('admin/sliders/') }}/{{ $objSlider->id }}/edit"> Edit </a>
	                  		<a class="btn btn-secondary" href="{{ url('admin/sliders/') }}/{{ $objSlider->id }}"> Show </a>
	                  		<form action="{{ url('admin/sliders') }}/{{ $objSlider->id }}" method="post" enctype="multipart/form-data">
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