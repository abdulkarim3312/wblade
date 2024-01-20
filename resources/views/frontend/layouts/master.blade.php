@php
  $nav_section = App\Models\NavSection::first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  @include('frontend.layouts.partials.metas')
  @include('frontend.layouts.partials.styles')
  <title>@yield('title') - {{ env('APP_NAME') }}</title>
  @yield('styles')
  <style>
    .login_btn{
      color: {{ $nav_section->login_text_color ?? '' }} !important;
    }
    .login_btn:hover{
      border-color: {{ $nav_section->login_hover_color ?? '' }} !important;
    }
    .star_now_btn:hover{
      color: {{ $nav_section->button_text_hover_color ?? '' }} !important;
      border-color: {{ $nav_section->button_hover_border_color ?? '' }} !important;
      background-color: {{ $nav_section->button_hover_color ?? '' }} !important;
    }
    .star_now_btn{
      color: {{ $nav_section->button_text_color ?? '' }} !important;
      border-color: {{ $nav_section->button_border_color ?? '' }} !important;
      background-color: {{ $nav_section->button_background_color ?? '' }} !important;
    }
    .privacy_link:hover{
      color: {{ $nav_section->text_hover_color ?? '' }} !important;
    }
    .privacy_link{
      color: {{ $nav_section->text_color ?? '' }} !important;
    }
    .term_link:hover{
      color: {{ $nav_section->text_hover_color ?? '' }} !important;
    }
    .term_link{
      color: {{ $nav_section->text_color ?? '' }} !important;
    }
    .portfolio_link:hover{
      color: {{ $nav_section->text_hover_color ?? '' }} !important;
    }
    .portfolio_link{
      color: {{ $nav_section->text_color ?? '' }} !important;
    }
    .main-btn{
      border: 1px solid {{ $nav_section->background_color ??'' }} !important;
      padding: 10px 1.5rem;
    }
    .navbar{
      padding-top: 20px !important;
      padding-bottom: 20px !important;
    }
    
    .rounded-5 {
      border-radius: 8px !important;
    }
    .rounded-pill {
      border-radius: 8px !important;
    }
    .main-btn:hover{
      border-radius: 8px !important;
    }
    .nav-link{
      font-size: 16px;
      font-weight: 500;
      line-height: 21px;
    }
    .btn{
      padding: 10px 1.5rem !important;
      font-size: 16px;
      font-weight: 500;
      line-height: 21px;
    }
  
  </style>
</head>

<body>
  @include('frontend.layouts.partials.navbar')
  @yield('main-content')
  @include('frontend.layouts.partials.footer')
  @include('frontend.layouts.partials.scripts')
  @yield('scripts')
</body>
</html>