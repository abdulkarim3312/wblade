@extends('frontend.auth.master')
@section('styles')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
  .logo a img{
    width: 200px !important;
    height: auto !important;
  }

  .text-white{
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
  }
  
  .input_bg{
    border-color: {{ $auth_page->input_border_color ?? '' }} !important;
    background-color: {{ $auth_page->input_background_color ?? '' }} !important;
  }
  .password_input{
    border-color: {{ $auth_page->input_border_color ?? '' }} !important;
    background-color: {{ $auth_page->input_background_color ?? '' }} !important;
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
    .form-check a{
      color: {{ $auth_page->forgot_password_link_color ?? '' }} !important;
    }
    .form-check a:hover{
      color: {{ $auth_page->forgot_password_link_hover_color ?? '' }} !important;
    }
    
    .rounded-pill{
      border-color: var(--secondary-bg);
    }
    .form-control:focus{
      box-shadow: none;
    }
    .agreement_text{
      margin-top: 4px;
      font-size: 15px;
      margin-bottom: 0;
    }
    .error_message p{
      margin-bottom: 0;
      padding-left: 1.5em;
      font-size: 15px;
      color: red;
    }
    .success_message p{
      margin-bottom: 0;
      padding-left: 1.5em;
      font-size: 15px;
      color: green;
    }
    .error_message small{
      margin-bottom: 0;
      font-size: 15px;
      color: red;
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
      <div class="row d-flex flex-grow-1 justify-content-center bg_image align-items-center" style="background-color:{{ $auth_page->background_color ?? ''}}">
    @endif

    
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto box-width">
        <div class="card border-0 my-5 rounded-5">
          <div class="card-body p-3 p-sm-5 shadow rounded-5" style="background-color: {{ $auth_page->card_background_color ?? '' }}">
            <div class="logo text-center pb-5">
              <a href="/">
                <img class="text-center site_logo" src="{{ $site_logo }}" alt="Logo">
              </a>
            </div>
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-floating @error('email') mb-0 @else mb-3 @enderror" >
                <input style="color: {{ $auth_page->input_placeholder_click_color ?? '' }}" type="email" id="email" class="form-control bg-dark input_bg  rounded-pill" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                <label for="email">Email address</label>
                @error('email')
                  <div class="error_message">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              
              <div class="form-floating">
                <input style="color: {{ $auth_page->input_placeholder_click_color ?? '' }}" type="password" class="form-control bg-dark password_input rounded-pill" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                  <div class="error_message">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              @if (Route::has('password.request'))
              <div class="form-check mb-3">
                <a class="forget_password" href="{{ route('password.request') }}">Forgot Password?</a>
              </div>
              @endif
              <div class="d-grid">
                <button class="btn btn-primary  btn-login login_btn_style text-uppercase fw-bold btn-warning-group rounded-pill my-2" type="submit">Login</button>
                <a href="{{ route('register') }}" class="btn btn-primary btn-login login_btn_style text-uppercase fw-bold btn-warning-group rounded-pill my-2" type="button" >Sign Up</a>
              </div>
              <hr class="my-4">
              <div class="d-grid mb-2">
                <a href="{{ route('login.social','google') }}" class="btn btn-google google_btn_color btn-login text-uppercase fw-bold rounded-pill" type="submit">
                  <i class="fab fa-google me-2"></i> Sign in with Google
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