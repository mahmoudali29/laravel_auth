@extends('layouts.app_admin')
@section('title','Show Courses')
@section('content')
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	@if (session('sucessMSG'))
	            <div class="alert alert-success">
	                {{ session('sucessMSG') }}
	            </div>
          	@endif

        	<a href="{{ url('admin/courses/create') }}" class="btn btn-primary">Add Course +</a>
        	 
          	<h2>Courses</h2>
          	<div class="table-responsive">
	            <table class="table table-striped table-sm">
	              <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>Course Name</th>
	                  	<th>Course Price</th>
	                  	<th>Course Description</th>
	                  	<th>Course Image</th>
	                  	<th>Actions</th>
	                </tr>
	              </thead>
	              <tbody>
	                 
	                @foreach($arrCourses as $objCourse)
	                <tr>
	                  	<td>{{ $objCourse->id }}</td>
	                  	<td>{{ $objCourse->name }}</td>
	                  	<td>{{ $objCourse->price }}</td>
	                  	<td>{{ $objCourse->description }}</td>
	                  	<td><img style="width: 100px;height: 100px;" src="{{ url('') }}/{{ $objCourse->image }}"></td>
	                  	<td>
	                  		<a class="btn btn-primary" href="{{ url('admin/courses/') }}/{{ $objCourse->id }}/edit"> Edit </a>
	                  		<a class="btn btn-secondary" href="{{ url('admin/courses/') }}/{{ $objCourse->id }}"> Show </a>
	                  		<form action="{{ url('admin/courses') }}/{{ $objCourse->id }}" method="post" enctype="multipart/form-data">
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