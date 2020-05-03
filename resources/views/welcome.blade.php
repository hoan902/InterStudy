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
                    <div class="row d-flex align-items-center" style="padding-top: 30px">
                        <div class="col-lg-6 col-md-9 ">
                            <div class="hero__caption">
                                <span data-animation="fadeInUp" data-delay=".4s">InterStudy academic portal</span>
                                @guest()
                                    <h1 data-animation="fadeInUp" data-delay=".6s">Please login!<br></h1>
                                    <p data-animation="fadeInUp" data-delay=".8s">To continue to the learning management
                                        system,
                                        please login.</p>
                                    <!-- Slider btn -->
                                    <div class="slider-btns">
                                        <!-- Hero-btn -->
                                        <li><a data-animation="fadeInLeft" data-delay="1.0s" class="btn radius-btn"
                                               href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                    </div>
                                @else
                                    <h1 data-animation="fadeInUp" data-delay=".6s">Welcome!<br></h1>
                                    <p data-animation="fadeInUp" data-delay=".8s">You are logged in! <br>
                                        To continue to your dashboard, press the button below.</p>
                                    <!-- Slider btn -->

                                    <div class="slider-btns">
                                        <!-- Hero-btn -->
                                        <li><a data-animation="fadeInLeft" data-delay="1.0s" class="btn radius-btn"
                                               @if(Auth::user()->user_type == 'student')
                                               href="/dashboard/{{ Auth::user()->student->id }}"
                                               @else
                                               href="/dashboardTutor"
                                                @endif
                                            >{{ __('Dashboard') }}</a></li>
                                    </div>

                                @endguest
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__img" data-animation="fadeInRight"
                                 data-delay="1s">
                                <img src="{{ asset('img/greenwich.jpg') }}" class="img-fluid rounded"
                                     alt="Greenwich image"
                                     style="max-width: 1000px; height: auto; float: right; padding-top: 50px;">
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
