@extends('layouts.app_admin')
@section('title','Show Courses')
@section('content')
 
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          @if (session('sucessMSG'))
            <div class="alert alert-success">
                {{ session('sucessMSG') }}
            </div>
          @endif


         {{--  @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif --}}


        	<form action="{{ url('admin/courses') }}/{{ $objCourse->id }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="name">Course Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  placeholder="Enter Course Name" value="{{ $objCourse->name }}" readonly>

                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"  placeholder="Enter Course Price" value="{{ $objCourse->price }}" readonly>

                  @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="form-group">
                  <label for="price">Description</label>
                  <textarea  readonly class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $objCourse->description }}</textarea>

                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <img style="width: 100px;height: 100px;" src="{{ url('') }}/{{ $objCourse->image }}">
                
             
                
             </form>
        </main>
@endsection