@extends('frontend.auth.master')
@section('styles')
<style>
  .logo a img{
    width: 200px !important;
    height: auto !important;
  }

  .text-white{
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
  }



  .bg_image{
    background-position: center; 
    background-repeat: no-repeat;
    background-size: cover;
  }
  .google_btn_color{
      color: {{ $auth_page->google_button_text_color ?? '' }} !important;
      border-color: {{ $auth_page->google_button_border_color ?? '' }} !important;
      background-color: {{ $auth_page->google_button_background_color ?? '' }} !important;
    }

  .google_btn_color:hover{
    color: {{ $auth_page->google_button_text_hover_color ?? '' }} !important;
    border-color: {{ $auth_page->google_button_hover_border_color ?? '' }} !important;
    background-color: {{ $auth_page->google_button_hover_color ?? '' }} !important;
  }

  .input_bg{
    border-color: {{ $auth_page->input_border_color ?? '' }} !important;
    background-color: {{ $auth_page->input_background_color ?? '' }} !important;
  }
  .password_input{
    border-color: {{ $auth_page->input_border_color ?? '' }} !important;
    background-color: {{ $auth_page->input_background_color ?? '' }} !important;
  }
  .forget_input{
    border-color: {{ $auth_page->input_border_color ?? '' }} !important;
    background-color: {{ $auth_page->input_background_color ?? '' }} !important;
  }

  .login_btn_style{
      color: {{ $auth_page->button_text_color ?? '' }} !important;
      border-color: {{ $auth_page->button_border_color ?? '' }} !important;
      background-color: {{ $auth_page->button_background_color ?? '' }} !important;
    }
    
  .login_btn_style:hover{
    color: {{ $auth_page->button_text_hover_color ?? '' }} !important;
    border-color: {{ $auth_page->button_hover_border_color ?? '' }} !important;
    background-color: {{ $auth_page->button_hover_color ?? '' }} !important;
  }
  .agreement_text{
    color: {{ $auth_page->agreement_color ?? '' }} !important;
  }

  .agreement_link{
    color: {{ $auth_page->agreement_link_color ?? '' }} !important;
  }

  .agreement_link:hover{
    color: {{ $auth_page->agreement_link_hover_color ?? '' }} !important;
  }

  .form-floating label{
    color: {{ $auth_page->input_placeholder_color ?? '' }} !important;
  }
</style>
@endsection
@section('auth-content')
<section id="login_form" class="login_wrapper">
  <div class="container d-flex flex-column min-vh-100 min-vw-100">
    @if ($auth_page && $auth_page->background_image)
    <div class="row d-flex flex-grow-1 justify-content-center bg_image align-items-center" style="
      background-image: url('{{ asset('upload/auth_image/'.$auth_page->background_image) }}')
      ">
    @else
    <div class="row d-flex flex-grow-1 justify-content-center bg_image align-items-center" style="background-color:{{ $auth_page->background_color ?? '' }}">
    @endif
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto box-width">
        <div class="card border-0 my-5 rounded-5">
          <div class="card-body p-3 p-sm-5 shadow rounded-5" style="background-color: {{ $auth_page->card_background_color ?? '' }}">
            <!-- <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5> -->
            <div class="logo text-center pb-5">
              <a href="/">
                {{-- <img class="text-center" src="{{ asset('frontend/images/logo.png') }}" alt="Logo"> --}}
                <img class="text-center" src="{{ $site_logo }}" alt="Logo">
              </a>
            </div>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-floating @error('email') mb-0 @else mb-3 @enderror" >
                <input style="color: {{ $auth_page->input_placeholder_click_color ?? '' }}" type="email" class="form-control bg-dark input_bg rounded-pill" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                <label for="email">Email address</label>
                @error('email')
                  <div class="error_message">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              
              <div class="form-floating @error('password') mb-0 @else mb-3 @enderror">
                <input style="color: {{ $auth_page->input_placeholder_click_color ?? '' }}" type="password" class="form-control bg-dark password_input rounded-pill" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                  <div class="error_message">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input style="color: {{ $auth_page->input_placeholder_click_color ?? '' }}" type="password" class="form-control bg-dark forget_input rounded-pill" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                <label for="password_confirmation">Confirm Password</label>
                @error('password_confirmation')
                  <div class="error_message">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="form-check @error('terms') mb-0 @else mb-3 @enderror">
                <label>
                  <input class="" name="terms" type="checkbox" value="1" @if(old('terms') == 1) checked @endif>
                  <p class="agreement_text">By signing up, I agree to the <a class="agreement_link" href="{{ route('terms') }}">terms of service </a> and <a class="agreement_link" href="{{ route('privacy-policy') }}">privacy policy.</a></p>
                </label>
                @error('terms')
                  <div class="error_message">
                    <small>{{ $message }}</small>
                  </div>
                @enderror
              </div>
              <div class="d-grid mt-3">
                <button class="btn btn-primary btn-login login_btn_style text-uppercase fw-bold btn-warning-group rounded-pill my-2" type="submit">Register</button>
                <a href="{{ route('login') }}" class="btn btn-primary login_btn_style btn-login text-uppercase fw-bold btn-warning-group rounded-pill my-2" type="button" >Sign In</a>
              </div>
              <hr class="my-4">
              <div class="d-grid mb-2">
                <a href="{{ route('login.social','google') }}" class="btn  btn-login google_btn_color  text-uppercase fw-bold rounded-pill" type="submit">
                  <i class="fab fa-google me-2"></i> Sign up with Google
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection