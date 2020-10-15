@extends('layouts.app_admin')
@section('title','Show Slider')
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
                  <input type="text" class="form-control @error('title1') is-invalid @enderror" id="title1" name="title1"  placeholder="Enter title1" value="{{ $objSlider->title1 }}" readonly>

                  @error('title1')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="price">Title2</label>
                  <input type="text" class="form-control @error('title2') is-invalid @enderror" id="title2" name="title2"  placeholder="Enter title2" value="{{ $objSlider->title2 }}" readonly>

                  @error('title2')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="form-group">
                  <label for="price">Description</label>
                  <textarea  readonly class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $objSlider->description }}</textarea>

                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <img style="width: 100px;height: 100px;" src="{{ url('') }}/{{ $objSlider->image }}">
                
             
                
             </form>
        </main>
@endsection