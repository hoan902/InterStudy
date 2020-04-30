<!doctype html>
<html class="no-js" lang="zxx">

<body>

@extends('layouts.navbar')
@extends('layouts.preloader')

<main>
    <!-- Slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider slider-padding d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6 col-md-9 ">
                            <div class="hero__caption">
                                <span data-animation="fadeInUp" data-delay=".4s">Welcome to the InterStudy portal</span>
                                <h1 data-animation="fadeInUp" data-delay=".6s">InterStudy<br>Portal</h1>
                                <p data-animation="fadeInUp" data-delay=".8s">To continue to the learning management
                                    system,
                                    please login.</p>
                                <!-- Slider btn -->
                                <div class="slider-btns">
                                    <!-- Hero-btn -->
                                    <li><a data-animation="fadeInLeft" data-delay="1.0s" class="btn radius-btn"
                                       href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__img d-none d-lg-block f-right" data-animation="fadeInRight"
                                 data-delay="1s">
                                <img src="{{ asset('img/greenwich.jpg') }}" alt="" width="800" height="504">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Slider Area End -->

</main>


</body>
</html>
