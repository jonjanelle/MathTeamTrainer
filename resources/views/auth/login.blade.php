@extends('master.master')
@section('title')
  Login - Math Team Trainer
@endsection
@push('head')
  <!--slick carousel css-->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
  <link rel="stylesheet" href="css/login.css">
@endpush

@section('content')
  <div class="header">Math Team Trainer</div>
  <div class="row">
    <div class="col col-md-6 col-md-push-6">
      @include('forms.loginform')
    </div>

    <div class="col col-md-6 col-md-pull-6">
      <div class="alert alert-info" id="site-desc">
        Math Team Trainer is a tool to help you prepare for
        high school mathematics contests. Hone your skills by solving
        challenges spanning a wide variety of topics, track your progress, and
        see how you stack up against others!
      </div>
      <div class ="carousel-div">
        <div class="carousel">
          <div><img src="\images\carousel1.jpg" alt="image 1"></div>
          <div><img src="\images\carousel2.jpg" alt="image 2"></div>
          <div><img src="\images\carousel3.jpg" alt="image 3"></div>
        </div>
      </div>

    </div>

  </div>
@endsection

@push('body')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.carousel').slick({
        dots: true,
        arrows: true,
        speed: 300,
        slidesToShow: 1,
        autoplay: true,
        autoplayspeed: 3000,
        centerMode: true,
      });
    });
  </script>
@endpush
