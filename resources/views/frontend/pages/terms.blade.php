@extends('frontend.layouts.master')
@section('title', 'Terms of Service')
@section('styles')
<style>

</style>
@endsection
@section('main-content')
<section id="terms">
  <div class="container wrapper mt-5">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <h1 class="terms_header">{{ $terms? $terms->main_title: '' }}</h1>
        <h4 class="terms_sub">Date of Last Revision: {{ \Carbon\Carbon::parse($terms ? $terms->updated_at: '')->format('F d, Y')}}</h4>
        <p class="term_pera"><span>{!! $terms ? $terms->description: '' !!}</span></p>
        {{-- <p class="term_pera"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sequi dolor esse earum aliquam, omnis ex, dolorum, in ad facilis nobis quos et nulla ducimus molestiae. Nemo placeat consequuntur tenetur!</span><span>Obcaecati veritatis ratione, odio, deleniti officiis repudiandae omnis iure tempora eos porro dolore quod unde vitae aliquid ab ut alias aliquam. Cumque obcaecati et, ratione reprehenderit quaerat doloremque repudiandae. Vero!</span><span>Adipisci iusto nihil nulla nemo aliquam, minima, dolore facere inventore veniam incidunt omnis molestias? Numquam qui nisi inventore sed deserunt molestias aspernatur, vel rerum exercitationem, velit nobis provident debitis quasi?</span></p>
        <p class="term_pera"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sequi dolor esse earum aliquam, omnis ex, dolorum, in ad facilis nobis quos et nulla ducimus molestiae. Nemo placeat consequuntur tenetur!</span><span>Obcaecati veritatis ratione, odio, deleniti officiis repudiandae omnis iure tempora eos porro dolore quod unde vitae aliquid ab ut alias aliquam. Cumque obcaecati et, ratione reprehenderit quaerat doloremque repudiandae. Vero!</span><span>Adipisci iusto nihil nulla nemo aliquam, minima, dolore facere inventore veniam incidunt omnis molestias? Numquam qui nisi inventore sed deserunt molestias aspernatur, vel rerum exercitationem, velit nobis provident debitis quasi?</span></p>
        <p class="term_pera"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sequi dolor esse earum aliquam, omnis ex, dolorum, in ad facilis nobis quos et nulla ducimus molestiae. Nemo placeat consequuntur tenetur!</span><span>Obcaecati veritatis ratione, odio, deleniti officiis repudiandae omnis iure tempora eos porro dolore quod unde vitae aliquid ab ut alias aliquam. Cumque obcaecati et, ratione reprehenderit quaerat doloremque repudiandae. Vero!</span><span>Adipisci iusto nihil nulla nemo aliquam, minima, dolore facere inventore veniam incidunt omnis molestias? Numquam qui nisi inventore sed deserunt molestias aspernatur, vel rerum exercitationem, velit nobis provident debitis quasi?</span></p>
        <p class="term_pera"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sequi dolor esse earum aliquam, omnis ex, dolorum, in ad facilis nobis quos et nulla ducimus molestiae. Nemo placeat consequuntur tenetur!</span><span>Obcaecati veritatis ratione, odio, deleniti officiis repudiandae omnis iure tempora eos porro dolore quod unde vitae aliquid ab ut alias aliquam. Cumque obcaecati et, ratione reprehenderit quaerat doloremque repudiandae. Vero!</span><span>Adipisci iusto nihil nulla nemo aliquam, minima, dolore facere inventore veniam incidunt omnis molestias? Numquam qui nisi inventore sed deserunt molestias aspernatur, vel rerum exercitationem, velit nobis provident debitis quasi?</span></p>
        <p class="term_pera"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sequi dolor esse earum aliquam, omnis ex, dolorum, in ad facilis nobis quos et nulla ducimus molestiae. Nemo placeat consequuntur tenetur!</span><span>Obcaecati veritatis ratione, odio, deleniti officiis repudiandae omnis iure tempora eos porro dolore quod unde vitae aliquid ab ut alias aliquam. Cumque obcaecati et, ratione reprehenderit quaerat doloremque repudiandae. Vero!</span><span>Adipisci iusto nihil nulla nemo aliquam, minima, dolore facere inventore veniam incidunt omnis molestias? Numquam qui nisi inventore sed deserunt molestias aspernatur, vel rerum exercitationem, velit nobis provident debitis quasi?</span></p>
        <p class="term_pera"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sequi dolor esse earum aliquam, omnis ex, dolorum, in ad facilis nobis quos et nulla ducimus molestiae. Nemo placeat consequuntur tenetur!</span><span>Obcaecati veritatis ratione, odio, deleniti officiis repudiandae omnis iure tempora eos porro dolore quod unde vitae aliquid ab ut alias aliquam. Cumque obcaecati et, ratione reprehenderit quaerat doloremque repudiandae. Vero!</span><span>Adipisci iusto nihil nulla nemo aliquam, minima, dolore facere inventore veniam incidunt omnis molestias? Numquam qui nisi inventore sed deserunt molestias aspernatur, vel rerum exercitationem, velit nobis provident debitis quasi?</span></p>
        <p class="term_pera"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sequi dolor esse earum aliquam, omnis ex, dolorum, in ad facilis nobis quos et nulla ducimus molestiae. Nemo placeat consequuntur tenetur!</span><span>Obcaecati veritatis ratione, odio, deleniti officiis repudiandae omnis iure tempora eos porro dolore quod unde vitae aliquid ab ut alias aliquam. Cumque obcaecati et, ratione reprehenderit quaerat doloremque repudiandae. Vero!</span><span>Adipisci iusto nihil nulla nemo aliquam, minima, dolore facere inventore veniam incidunt omnis molestias? Numquam qui nisi inventore sed deserunt molestias aspernatur, vel rerum exercitationem, velit nobis provident debitis quasi?</span></p> --}}
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
@endsection