@extends('layouts.app_front')
@section('title','Home')  
@section('content')
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="font-28 text-white">Event Details 2</h2>
              <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-theme-colored">Page Title</li>
              </ol>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <section class="bg-theme-colored">
      <div class="container pt-40 pb-40">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 id="basic-coupon-clock" class="text-white"></h2>
            <!-- Final Countdown Timer Script -->
            <script type="text/javascript">
              $(document).ready(function() {
                $('#basic-coupon-clock').countdown('{{ $objEvent->start_date }}', function(event) {
                  $(this).html(event.strftime('%D days %H:%M:%S'));
                });
              });
            </script>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <ul>
              <li>
                <h5>Topics:</h5>
                <p>{{ $objEvent->topics }}</p>
              </li>
              <li>
                <h5>Host:</h5>
                <p>{{ $objEvent->host }}</p>
              </li>
              <li>
                <h5>Location:</h5>
                <p>{{ $objEvent->location }}</p>
              </li>
              <li>
                <h5>Start Date:</h5>
                <p>{{ $objEvent->start_date }}</p>
              </li>
              <li>
                <h5>End Date:</h5>
                <p>{{ $objEvent->end_date }}</p>
              </li>
              <li>
                <h5>Website:</h5>
                <p>{{ $objEvent->website }}</p>
              </li>
              <li>
                <h5>Share:</h5>
                {{-- <div class="styled-icons icon-sm icon-gray icon-circled">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                </div> --}}

                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                {{-- <a class="a2a_dd" href="https://www.addtoany.com/share"></a> --}}
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_linkedin"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->

              </li>
            </ul>
          </div>
          <div class="col-md-8">
            <div class="owl-carousel-1col" data-nav="true">
              
              @foreach($arrSliderPhotos as $objSliderPhoto) 
                <div class="item"><img src="{{ url('') }}/{{ $objSliderPhoto->photo }}" alt=""></div>
              @endforeach


            </div>
          </div>
        </div>
        <div class="row mt-60">
          <div class="col-md-6">
            <h4 class="mt-0">Event Description</h4>
            <p>{{ $objEvent->description }}</p>
          </div>
          <div class="col-md-6">
            <blockquote>
              <p>{{ $objEvent->source_title }}</p>
              <footer>Someone famous in <cite title="Source Title">{{ $objEvent->source_title_writer }}</cite></footer>
            </blockquote>
          </div>
        </div>
        <div class="row mt-40">
          <div class="col-md-12">
            <h4 class="mb-20">Keynote Speakers</h4>
            <div class="owl-carousel-6col" data-nav="true">
              
              @foreach($arrSpeakers as $objSpeaker)
                <div class="item">
                  <div class="attorney">
                    <div class="thumb"><img src="https://randomuser.me/api/portraits/men/51.jpg" alt=""></div>
                    <div class="content text-center">
                      <h5 class="author mb-0"><a class="text-theme-colored" href="#">{{ $objSpeaker->name }}</a></h5>
                      <h6 class="title text-gray font-12 mt-0 mb-0">{{ $objSpeaker->position }}</h6>
                    </div>
                  </div>
                </div>
              @endforeach
               
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Registration Form -->
    <section class="divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x1280">
      <div class="container-fluid">
        <div class="section-title">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
              <h3 class="title text-theme-colored">Registration Form</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form id="booking-form" name="booking-form" action="includes/event-register.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Name" name="register_name" required="" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Email" name="register_email" class="form-control" required="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Phone" name="register_phone" class="form-control" required="">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Ticket types</label>
                    <select name="ticket_type" class="form-control">
                      <option>One Person</option>
                      <option>Two Person</option>
                      <option>Family Pack</option>
                      <option>Premium</option>
                    </select>
                  </div>
                </div>
                 
                <div class="col-sm-12">
                  <div class="form-group text-center">
                    <input name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button data-loading-text="Please wait..." class="btn btn-dark btn-theme-colored btn-sm btn-block mt-20 pt-10 pb-10" type="submit">Register now</button>
                  </div>
                </div>
              </div>
            </form>
            <!-- Job Form Validation-->
            <script type="text/javascript">
              $("#booking-form_").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
                      setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                  });
                }
              });
            </script>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="mb-20">Photo Gallery</h4>
            <div class="owl-carousel-5col" data-nav="true">
              
             @foreach($arrGalaryPhotos as $objGalaryPhoto)  
                <div class="item"><img src="{{ url('') }}/{{ $objGalaryPhoto->photo }}" alt=""></div>
              @endforeach
               
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  </div>
@endsection 


    