@php
  $auth_page = App\Models\AuthContent::first();
@endphp
@extends('frontend.auth.master')
@section('styles')
<style>
  .logo a img{
    width: 200px !important;
    height: auto !important;
  }
  .bg_image{
    background-position: center; 
    background-repeat: no-repeat;
    background-size: cover;
  }
  .input_bg{
    border-color: {{ $auth_page->input_border_color ?? '' }} !important;
    background-color: {{ $auth_page->input_background_color ?? '' }} !important;
  }
  .password_input{
    border-color: {{ $auth_page->input_border_color ?? '' }} !important;
    background-color: {{ $auth_page->input_background_color ?? '' }} !important;
  }
  .confirm_input{
    border-color: {{ $auth_page->input_border_color ?? '' }} !important;
    background-color: {{ $auth_page->input_background_color ?? '' }} !important;
  }

  .reset_login_btn:hover{
    color: {{ $auth_page->forgot_password_link_hover_color ?? '' }} !important;
    background-color: {{ $auth_page->forgot_password_link_color ?? '' }} !important;
  }
  .reset_login_btn{
    color: {{ $auth_page->button_text_color ?? '' }} !important;
    border-color: {{ $auth_page->button_border_color ?? '' }} !important;
    background-color: {{ $auth_page->button_background_color ?? '' }} !important;
  }
  .reset_login_btn:hover{
    color: {{ $auth_page->button_text_hover_color ?? '' }} !important;
    border-color: {{ $auth_page->button_hover_border_color ?? '' }} !important;
    background-color: {{ $auth_page->button_hover_color ?? '' }} !important;
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
      <div class="row d-flex flex-grow-1 justify-content-center bg_image align-items-center" style="background-color:{{ $auth_page->background_color }}">
    @endif
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto box-width">
          <div class="card border-0 my-5 rounded-5">
            <div class="card-body p-3 p-sm-5 shadow rounded-5"  style="background-color: {{ $auth_page->card_background_color ?? '' }}">
              <!-- <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5> -->
              <div class="logo text-center pb-5">
                <a href="/">
                  <img class="text-center" src="{{ $site_logo }}" alt="Logo">
                </a>
              </div>
              <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="form-floating @error('email') mb-0 @else mb-3 @enderror" >
                  <input type="email" class="form-control bg-dark input_bg rounded-pill" id="email" name="email" value="{{ old('email', $request->email) }}" placeholder="name@example.com">
                  <label for="email">Email address</label>
                  @error('email')
                    <div class="error_message">
                      <p>{{ $message }}</p>
                    </div>
                  @enderror
                </div>
                <div class="form-floating @error('password') mb-0 @else mb-3 @enderror">
                  <input type="password" class="form-control bg-dark password_input rounded-pill" id="password" name="password" placeholder="Password">
                  <label for="password">Password</label>
                  @error('password')
                    <div class="error_message">
                      <p>{{ $message }}</p>
                    </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control bg-dark confirm_input rounded-pill" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                  <label for="password_confirmation">Confirm Password</label>
                  @error('password_confirmation')
                    <div class="error_message">
                      <p>{{ $message }}</p>
                    </div>
                  @enderror
                </div>
                <div class="d-grid mt-3">
                  <button class="btn btn-primary btn-login reset_login_btn text-uppercase fw-bold btn-warning-group rounded-pill my-2" type="submit">Reset Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection