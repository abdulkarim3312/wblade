@php
  $nav_section = App\Models\NavSection::first();
@endphp
@section('styles')
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
  .second_Section_button a:hover::after{
    background-color: {{ $nav_section->button_hover_color ?? '' }} !important;
    border-color: {{ $nav_section->button_border_color ?? '' }} !important;
    color: {{ $nav_section->button_text_color ?? '' }} !important;
  }
  .second_Section_button{
    border: 1px solid {{ $nav_section->button_text_color ?? '' }}
  }

  .subscribe_btn:hover a{
    background-color: {{ $nav_section->button_hover_color ?? '' }}!important;
    color: {{ $nav_section->button_text_hover_color ?? '' }}!important;
    border: 1px solid {{ $nav_section->button_hover_border_color ?? '' }};
  }
  .subscribe_btn{
    background-color: {{ $nav_section->button_background_color ?? '' }}!important;
    color: {{ $nav_section->button_text_color ?? '' }}
    border: 1px solid {{ $nav_section->button_border_color ?? '' }}
  }
  .navbar-brand img{
    width: 200px !important;
    height: auto !important;
  }
</style>
@endsection
<header id="full_nav">
  <div class="header" style="background-color:{{ $nav_section->background_color ??'' }}">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ $site_logo }}" alt="Logo" style="width: 200px !important; height: auto !important;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa-light  navbar-toggler-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-2">
              @if(Route::is('terms') || Route::is('privacy-policy'))
                <a class="nav-link portfolio_link" href="/#gallery">Portfolio</a>
              @else
                <a class="nav-link portfolio_link" href="#gallery">Portfolio</a>
              @endif
            </li>
            <li class="nav-item px-2">
              <a class="nav-link term_link {{ (Route::is('terms')) ? 'active' : ''}}" href="{{ route('terms') }}">Terms of Service</a>
            </li>
            <li class="nav-item px-2">
              <a class="nav-link privacy_link {{ (Route::is('privacy-policy')) ? 'active' : ''}}" href="{{ route('privacy-policy') }}">Privacy Policy</a>
            </li>
            <li class="nav-item px-2">
              <a class="nav-link portfolio_link" href="#footer">Contact Us</a>
            </li>
          </ul>
          <div class="header_right">
            <div class="text-lg-end">
              <a href="{{ route('register') }}" class="btn px-4 rounded-pill star_now_btn btn-warning-group">{{ $nav_section->button_text??'' }}</a>
              <a href="{{ route('login') }}" class="login_btn main-btn ">Login</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>