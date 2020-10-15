@extends('layouts.app_admin')
@section('title','Edit Sliders')
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


        	<form action="{{ url('admin/sliders') }}/{{ $objSlider->id }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="Title1">Title1</label>
                  <input type="text" class="form-control @error('title1') is-invalid @enderror" id="title1" name="title1"  placeholder="Enter title1" value="{{ $objSlider->title1 }}">

                  @error('title1')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="price">Title2</label>
                  <input type="text" class="form-control @error('title2') is-invalid @enderror" id="title2" name="title2"  placeholder="Enter title2" value="{{ $objSlider->title2 }}">

                  @error('title2')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="form-group">
                  <label for="title2">link</label>
                  <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link"  placeholder="Enter link" value="{{ $objSlider->link }}">

                  @error('link')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="form-group">
                  <label for="price">Description</label>
                  <textarea  class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $objSlider->description }}</textarea>

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
                  <img style="width: 100px;height: 100px;" src="{{ url('') }}/{{ $objSlider->image }}">
                </div>
                
             
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </main>
@endsection