@extends('layouts.app_front')
@section('title','Home')  
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Event Grid 4column</h3>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-gray-silver">Page Title</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Upcoming Events -->
    <section id="upcoming-events" class="divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pb-50 pt-80">
        <div class="section-content">
          <div class="row">
            
            @foreach($arrEvents as $objEvent)
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="schedule-box maxwidth500 bg-light mb-30">
                  <div class="thumb">
                    
                    @if(isset($objEvent->Photo->photo))
                    <img style="height: 160px;" class="img-fullwidth" alt="" src="{{ $objEvent->Photo->photo }}">
                    @else
                      <img style="height: 160px;" class="img-fullwidth" alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1200px-No_image_3x4.svg.png">
                    @endif


                    <div class="overlay">
                      <a href="{{ url('event_details') }}/{{ $objEvent->id }}"><i class="fa fa-calendar mr-5"></i></a>
                    </div>
                  </div>
                  <div class="schedule-details clearfix p-15 pt-10">
                    <h5 class="font-16 title"><a href="{{ url('event_details') }}/{{ $objEvent->id }}">{{ $objEvent->topics }}</a></h5>
                    <ul class="list-inline font-11 mb-20">
                      <li><i class="fa fa-calendar mr-5"></i> {{ $objEvent->start_date }}</li>
                      <li><i class="fa fa-map-marker mr-5"></i> {{ $objEvent->location }}</li>
                    </ul>
                    <p>{{ $objEvent->description }}</p>
                    <div class="mt-10">
                     <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="#">Register</a>
                     <a href="{{ url('event_details') }}/{{ $objEvent->id }}" class="btn btn-dark btn-sm mt-10">Details</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
             
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  </div>
@endsection 


    