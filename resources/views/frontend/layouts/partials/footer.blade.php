@php
   $footer = App\Models\Footer::first();
   $social = App\Models\Social::first();
@endphp
<style>
  .hover_color{
    color: {{ $footer->text_color ?? '' }}
  }
  .hover_color:hover{
    color: {{ $footer->text_hover_color ?? '' }}
  }

  .privacy_color{
    color: {{ $footer->text_color ?? '' }}
  }
  .privacy_color:hover{
    color: {{ $footer->text_hover_color ?? '' }}
  }
  .footer_about_us{
    color: #ffffff;
    width: 80%;
    font-size: 16px;
    line-height: 24px;
  }
  /* social css */
  .social_media_v_one {
    position: relative;
  }
  .social_media_v_one ul {
    padding: 0;
    margin: 0;
  }
  .social_media_v_one ul li {
      position: relative;
      display: inline-block;
      margin-right: 10px;
      margin-bottom: 0px !important;
  }
  .social_media_v_one.light ul li a {
      background: #714a9c;
  }
  .social_media_v_one ul li a {
      width: 40px;
      height: 40px;
      line-height: 40px;
      text-align: center;
      display: block;
      border-radius: 50px;
      color: #fff;
      transition: all 0.5s ease;
  }
  .social_media_v_one ul li a span {
      opacity: 0.8;
      transition: all 0.5s ease;
      color: #fff;
  }
  .social_media_v_one ul li a small {
      position: absolute;
      padding: 5px 15px;
      border-radius: 5px;
      background: #fff;
      color: #078586;
      font-size: 13px;
      line-height: 13px;
      font-weight: 600;
      min-width: 100px;
      text-align: center;
      margin: auto;
      left: -10px;
      right: 0;
      top: -35px;
      transition: all 0.5s ease;
      opacity: 0;
  }
  .link_wadget .link_wadget_style a{
    font-size: 16px !important;
  }
  .location{
    /* color: #fff; */
    color: {{ $footer->text_color ?? '' }}
  }
  .location_text{
    font-size: 16px;
    line-height: 24px;
    width: 60%;
    /* color: #aaafb8; */
    color: {{ $footer->location_text_color ?? '' }} !important;
  }
  .contact{
    /* color: #fff; */
    color: {{ $footer->text_color ?? '' }} !important;
  }
  .contact_text{
    font-size: 16px;
    line-height: 24px;
    /* color: #aaafb8; */
    color: {{ $footer->contact_text_color ?? '' }} !important;
  }
  .fo_wid_title{
    color: {{ $footer->text_color ?? '' }} !important;
  }
  .icon{
    color: {{ $footer->social_icon_color ?? '' }} !important;
  }
  .link_background{
    background-color: {{ $footer->social_background_color ?? '' }} !important;
  }
</style>
<!-- Footer Start -->
<Section id="footer" style="background-color:{{ $footer->background_color ?? '' }}">
  <div class="container wrapper">
    <div class="row foooter_wrapper">
      <div class="col-md-6 col-sm-12 col-xs-12 footer_column">
        <a href="/">
          <img src="{{ $site_logo }}" alt="Logo" style="width: 200px !important; height: auto !important;">
        </a>
        <p class="copywright_text mt-1 mb-2">{{ $footer->copy_right ?? '' }}</p>
        <p class="footer_about_us">{{ $footer->about_us ?? '' }}</p>
        <h6 class="location_text mb-4">{{ $footer->location ?? '' }}</h6>
        <div class="social_media_v_one light mb-4">
          <ul>
             <li>
                <a href="{{ $social->facebook ?? '' }}" class="link_background" target="_blank" > <span class="fa-brands fa-facebook icon"></span>
                   <small>facebook</small>
                </a>
             </li>
             <li>
                <a href="{{ $social->twitter ?? '' }}" class="link_background" target="_blank"> <span class="fa-brands fa-x-twitter icon"></span>
                   <small>twitter</small>
                </a>
             </li>
             <li>
                <a href="{{ $social->instagram ?? '' }}" class="link_background" target="_blank"> <span class="fa-brands fa-instagram icon"></span>
                   <small>instagram</small>
                </a>
             </li>
             <li>
                <a href="{{ $social->linkedin ?? '' }}" class="link_background" target="_blank"> <span class="fa-brands fa-linkedin icon"></span>
                   <small>linkedin</small>
                </a>
             </li>
             <li>
                <a href="{{ $social->tiktok ?? '' }}" class="link_background" target="_blank"> <span class="fa-brands fa-tiktok icon"></span>
                   <small>tiktok</small>
                </a>
             </li>
             <li>
                <a href="{{ $social->youtube ?? '' }}" class="link_background" target="_blank"> <span class="fa-brands fa-youtube icon"></span>
                   <small>youtube</small>
                </a>
             </li>
          </ul>
       </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6 footer_column">
        <h5 class="fo_wid_title">Company</h5>
        <ul class="link_wadget">
          <li class="link_wadget_style mt-2"><a href="/">Home</a></li>
          <li class="link_wadget_style portfolio_link"><a class="portfolio_link" href="#gallery">Portfolio</a></li>
          <li class="link_wadget_style">
            <a class="nav-link term_link {{ (Route::is('terms')) ? 'active' : ''}}" href="{{ route('terms') }}">{{ $footer->term ?? '' }}</a>
          </li>
          <li class="link_wadget_style">
            <a class="nav-link privacy_link {{ (Route::is('privacy-policy')) ? 'active' : ''}}" href="{{ route('privacy-policy') }}">{{ $footer->privacy_policy ?? '' }}</a>
          </li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6 footer_column">
        <h5 class="fo_wid_title">Contact</h5>
        <ul class="link_wadget">
          <li class="link_wadget_style mt-4">
            <h6 class="contact_text">{{ $footer->phone ?? '' }}</h6>
            <h6 class="contact_text">{{ $footer->email_one ?? '' }}</h6>
            <h6 class="contact_text">{{ $footer->email_two ?? '' }}</h6>
          </li>
        </ul>
      </div>
      {{-- <div class="col-md-9 col-sm-9 col-xs-9 footer_column">
        <div class="copywrit_wrapper">
          <div class="copyright-section text_color" style="background-color:{{ $footer->background_color ?? '' }}">
            <a href="{{ route('terms') }}" class="copywrit_links hover_color">{{ $footer->term ?? '' }}</a>
            <a href="{{ route('privacy-policy') }}" class="copywrit_links privacy_color">{{ $footer->privacy_policy ?? '' }}</a>
            <p class="mt-4 copywright_text">{{ $footer->copy_right ?? '' }}</p>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</Section>
{{-- <div class="copywrit_wrapper px-5">
  <div class="container-fluid copyright-section">
    <p class="p-4 copywright_text">© Kaliber. All Rights Reserved.</p>
    <a href="terms.html" class="copywrit_links">Terms of Seervices</a>
    <a href="privacy.html" class="copywrit_links">Privacy Policy</a>
  </div>
</div> --}}
<!-- Footer End -->