@extends('layouts.app_admin')
@section('title','Create Course')
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


        	<form action="{{ url('admin/courses') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Course Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  placeholder="Enter Course Name" value="{{ old('name') }}">

                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"  placeholder="Enter Course Price" value="{{ old('price') }}">

                  @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="form-group">
                  <label for="price">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>

                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="price">Image</label>
                  <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                  @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                
             
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </main>
@endsection