@extends('frontend.layouts.master')
@section('title', 'Home')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
  .bg_primary{
    background-color: #301934;
    color: #ffffff;
  }
  .bg_primary .image_content{
    color: #ffffff;
  }
  .mt-10{
    margin-top: 7rem;
  }
  .second_Section_button{
    color: {{ $secondSection->button_text_color ?? '' }} !important;
    border-color: {{ $secondSection->button_border_color ?? '' }} !important;
    background-color: {{ $secondSection->button_background_color ?? '' }}!important;
  }
  .second_Section_button:hover{
    color: {{ $secondSection->button_text_color ?? '' }} !important;
    border-color: {{ $secondSection->button_hover_border_color ?? '' }} !important;
    background-color: {{ $secondSection->button_hover_color ?? '' }} !important;
  }
  

  .btn_style{
    color: {{ $gallery->button_text_color ?? '' }} !important;
    border-color: {{ $gallery->button_border_color ?? '' }} !important;
    background-color: {{ $gallery->button_background_color ?? '' }} !important;
  }

  .btn_style:hover{
    color: {{ $gallery->button_text_hover_color ?? '' }} !important;
    border-color: {{ $gallery->button_hover_border_color ?? '' }} !important;
    background-color: {{ $gallery->button_hover_color ?? '' }} !important;
  }

  
  .subscribe_btn:hover{
    background-color: {{ $subscribe->button_hover_color ?? '' }}!important;
    color: {{ $subscribe->button_text_hover_color ?? '' }}!important;
    border: 1px solid {{ $secondSection->button_hover_border_color ?? '' }} !important;
  }
  .subscribe_btn{
    background-color: {{ $subscribe->button_background_color ?? '' }}!important;
    color: {{ $subscribe->button_text_color ?? '' }}
    border: 1px solid {{ $subscribe->button_border_color ?? '' }}
  }
  .gallery_wrapper{
    margin-top: -48px;
  }

  .modal-body {
    position:relative;
    padding:0px;
  }
  .btn-close {
    position: absolute;
    right: -13px;
    top: -24px;
  }
  .btn-close:focus{
    box-shadow: none !important;
  }
  .error-message{
    color: red;
  }
  #myVideo{
    height: 87vh;
  }
  /*----client_logo_carousel------*/
.client_logo_carousel {
  position: relative;
  overflow-x: hidden;
}
.client_logo_carousel.type_one .swiper-slide, .client_logo_carousel.type_one .owl-item {
  position: relative;
}
.client_logo_carousel.type_one .swiper-slide .image, .client_logo_carousel.type_one .owl-item .image {
  text-align: center;
  position: relative;
  margin: 0px 20px;
  padding: 20px 20px;
}
.client_logo_carousel.type_one .swiper-slide .image img, .client_logo_carousel.type_one .owl-item .image img {
  width: 200px;
  height: auto;
}
.client_logo_carousel.type_one .owl-item .image::before {
  display: none;
}
.client_logo_carousel.type_one .owl-item:last-child .image::after {
  display: none;
}
.client_logo_carousel.type_two .swiper-slide .image, .client_logo_carousel.type_two .owl-item .image {
  text-align: center;
  position: relative;
}
.client_logo_carousel.type_two .swiper-slide .image img, .client_logo_carousel.type_two .owl-item .image img {
  width: 200px;
  height: auto;
}
.client_logo_carousel .swiper-wrapper {
  align-items: center;
}

</style>
@endsection
@section('main-content')


<!-- Video Start -->
<section id="video">
  <div id="video-background_wrapper">
    <video autoplay muted loop id="myVideo">
      <source src="{{ isset($videoLink->video) ? asset('upload/videos/'.$videoLink->video) : null }}" type="video/webm">
      Your browser does not support HTML5 video.
    </video>
  </div>
</section>

<!-- Video End -->

<!-- Image Container Start -->
<section class="image_container mb-5 pb-5 bg_primary" style="background-color: {{ $secondSection->background_color ?? '' }}">
  <div class="container image_wrapper wrapper">
    <div class="row">
      <div class="col-md-5 col-sm-6 m-0">
        <img src="{{ isset($secondSection->section_image) ? asset('upload/second_section_image/'.$secondSection->section_image) : null }}" alt="" class="brign-img">
      </div>
      <div class="col-md-7 col-sm-6 m-0">
        <h1 class="image_header">{{ $secondSection->main_title ?? '' }}</h1>
        <p class="image_content">{{ $secondSection->sub_title ?? '' }}</p>
        <div class="startnow_btn mt-4">
          <div class="start-btton">
            <a  href="{{ route('login') }}" class="btn py-2 px-5 btn-warning-group rounded-5 second_Section_button">{{ $secondSection->button_text ?? '' }}</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Image Container End -->

<!-- Gallery Start -->
{{-- style="background-color: {{ $gallery->background_color ?? '' }}" --}}
<section class="gallery_wrapper" style="background-color: {{ $gallery->background_color ?? '' }}">
  <div class="container wrapper pt-5 pb-5">
    <div class="row">
      <div class="col-md-5 col-sm-5 text-center">
        <img src="{{ isset($gallery->section_left_image) ? asset('upload/gallery_section_image/'.$gallery->section_left_image) : null }}" class="brign-img mb-5" alt="">
        <a href="{{ route('login') }}" class="btn py-2 px-5 btn_style btn-warning-group rounded-5">{{ $gallery->button_text ?? '' }}</a>
      </div>
      <div class="col-md-7 col-sm-7 gallery_images">
        <div class="row">
          <div class="col-md-12 col-sm-12 mb-4">
            <img src="{{ isset($gallery->section_right_top_image) ? asset('upload/gallery_section_image/'.$gallery->section_right_top_image) : null }}" alt="" class="w-100 h-100 mb-5 rounded-4">
          </div>
        </div>
        <div class="row images_gallery-2">
          <div class="col-md-8 col-sm-8 mb-4 image_g-1">
            <img src="{{ isset($gallery->section_right_bottom_left_image) ? asset('upload/gallery_section_image/'.$gallery->section_right_bottom_left_image) : null }}" alt="" class="w-100 h-100 rounded-4">
          </div>
          <div class="col-md-4 col-sm-4 mb-4 image_g-2">
            <img src="{{ isset($gallery->section_right_bottom_right_image) ? asset('upload/gallery_section_image/'.$gallery->section_right_bottom_right_image) : null }}" alt="" class="w-100 h-100 rounded-4">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Gallery End -->

<!-- Gallery Section Start -->
<section id="gallery" class="gallery-wrapper" style="background-color: {{ $galleryHeader->background_color ?? '' }}">
  <div class="container wrapper">
    <div class="row">
      <div class="col-12 header-text mt-10 text-center">
        <h1 class="text-center header_text text-white mb-2">{{ $galleryHeader->top_title ?? '' }}</h1>
        <p class="header_sub text-white mb-5">{{ $galleryHeader->sub_title ?? '' }}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="swiper mySwiper mb-5">
          <div class="swiper-wrapper">
            @if ($topGallery != '')
              @foreach ($topGallery as $item)
                <div class="swiper-slide open-portfolio" data-slide-video="{{ isset($item->video) ? asset('upload/portfolio/'.$item->video) : null }}">
                  <img src="{{ isset($item->image) ? asset('upload/portfolio/'.$item->image) : null }}" alt=""/>
                </div>
              @endforeach
            @endif
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Gallery Section End -->

<!-- Studio Center Start -->
<section id="studio_center" class="studio_wrapper pt-5 pb-5" style="background-color: {{ $studioHeader->background_color ?? '' }}">
  <div class="container wrapper">
    <div class="row">
      <div class="col-12 header-text text-center">
        <h1 class="text-center header_text mb-4 text-white">{{ $studioHeader->top_title ?? '' }}</h1>
        {{-- <p class="header_sub mb-5 text-white">{{ $studioHeader->sub_title ?? '' }}</p> --}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="client_logo_carousel type_one">
          <div class="swiper-container clientSwiper">
              <div class="swiper-wrapper">
                @foreach ($studios as $item)
                  <div class="swiper-slide">
                      <div class="image">
                        <img src="{{ isset($item->image) ? asset('upload/studio/'.$item->image) : null }}" alt="clients-logo">
                      </div>
                  </div>
                @endforeach
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Studiot Center End -->

<!-- Contact Start -->
{{-- <section id="contact" class="contact_wrappers pt-5" style="background-color: {{ $subscribe->background_color?? '' }}">
  <div class="container wrapper">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 col-12 mb-4">
        <h1 class="text-center header_text mb-4">{{ $subscribe->title ?? '' }}</h1>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 col-12 text-center">
        <input type="email" class="form-control text-white bg-transparent form-controller text-center"
          id="exampleFormControlInput1" placeholder="Enter Your Email">
      </div>
      <form id="submissionForm">
            <div class="col-md-12 col-sm-12 col-xs-12 col-12 text-center">
                <input type="email" name="email" class="form-control bg-transparent form-controller text-center"
                  id="email" placeholder="Enter Your Email">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 my-5 margin-bottom text-center">
              <button type="submit" class="btn rounded-5 py-2 subscribe_btn px-5 btn-warning-group">{{ $subscribe->button_text ?? '' }}</button>
            </div>
        </div>
      </form>
      <div class="col-md-12 col-sm-12 col-xs-12 my-5 margin-bottom text-center">
        <a href="#" class="btn rounded-5 py-2 subscribe_btn px-5 btn-warning-group">{{ $subscribe->button_text ?? '' }}</a>
      </div>
    </div>
  </div>
</section> --}}
<!-- Contact End -->
<!-- Modal Backdrop -->
<div class="reg_process_area modal fade" id="portfolioVideoModal" tabindex="-1" aria-labelledby="portfolioVideoModalLabel" aria-hidden="true" data-bs-backdrop='static'>
  <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close btn-close-white" style="color: #ffffff;" data-bs-dismiss="modal" aria-label="Close"></span></button> 
            <div class="ratio ratio-16x9">
              <video autoplay muted controls loop id="portfolioVideo">
                <source  type="video/mp4">
                Your browser does not support HTML5 video.
              </video>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  $(document).ready(function(){
    $('.open-portfolio').click(function () {
      var slideVideo = $(this).data('slide-video');
      var videoElement = $("#portfolioVideo");
      videoElement.attr("src", slideVideo);
      videoElement[0].load();
      $('#portfolioVideoModal').modal('show');
    });

    $('.btn-close').click(function () {
      var videoElement = $("#portfolioVideo");
      videoElement[0].pause();
    });
  })

  $(function () {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    toastr.options = {
      closeButton: true,
      progressBar: true,
    };
    let message = '{{ session('message') }}'
    if(message){
        toastr.success(message)
    }

    $('#submissionForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var form = this;
        $.ajax({
            type: 'POST',
            url: "{{ route('subscribe_validation') }}",
            data: formData,
            success: function(response) {
                $('.error-message').remove();
                form.reset(); 
                toastr.success(response.message);
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                  var errors = xhr.responseJSON.errors;
                  displayErrors(errors);
                }
            }
        });
    });

    function displayErrors(errors) {
      $('.error-message').remove();

      // Display new error messages
      $.each(errors, function(key, value) {
          $('#' + key).after('<span class="error-message">' + value[0] + '</span>');
      });
    }
  });
</script>

@endsection