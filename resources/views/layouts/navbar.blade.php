<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>App Landing Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>
<body class="sky-blue">
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="/"><img src="{{ asset('img/logo/interstudy.png')}} " alt="" width="200px"
                                             height="50px"></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li class="active"><a href="/"> Home</a></li>

                                    @auth
                                        <li><a href="/classroom">Classroom</a>
                                            <ul class="submenu">
                                                <li><a href="/">No ref</a></li>
                                                <li><a href="/">No ref</a></li>
                                            </ul>
                                        </li>
                                        @if(Auth::user()->user_type == 'admin'|| Auth::user()->user_type == 'staff')
                                            <li><a>User</a>
                                                <ul class="submenu">
                                                    <li><a href="/register">Add new user</a></li>
                                                    @if(Auth::user()->user_type == 'admin')
                                                        <li><a href="/admin/user">Manage users</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                                        @if(Auth::user()->user_type == 'admin'|| Auth::user()->user_type == 'staff')

                                            <li><a href="/students">Manage students</a></li>
                                            <li><a href="/tutors">Manage tutors</a></li>
                                        @endif
                                    @endauth


                                    @auth
                                        @if(Auth::user()->user_type == 'admin')
                                            <li><a href="#">{{ Auth::user()->admin->name }}</a>
                                                <ul class="submenu">
                                                    <li><a href="/profile">Profile</a></li>
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                                        </a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                          method="POST"
                                                          style="display: none;">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @elseif(Auth::user()->user_type == 'staff')
                                            <li><a href="#">{{ Auth::user()->staff->name }}</a>
                                                <ul class="submenu">
                                                    <li><a href="/profile">Profile</a></li>
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                                        </a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                          method="POST"
                                                          style="display: none;">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @elseif(Auth::user()->user_type == 'student')
                                            <li><a href="#">{{ Auth::user()->student->name }}</a>
                                                <ul class="submenu">
                                                    <li><a href="/profile">Profile</a></li>
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                                        </a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                          method="POST"
                                                          style="display: none;">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @elseif(Auth::user()->user_type == 'tutor')
                                            <li><a href="#">{{ Auth::user()->tutor->name }}</a>
                                                <ul class="submenu">
                                                    <li><a href="/profile">Profile</a></li>
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                                        </a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                          method="POST"
                                                          style="display: none;">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @endif
                                    @else
                                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<main>
    <div class="container">
        <div class="row h-50">
            <div class="col-sm-12 my-auto">
                @yield('content')
            </div>
        </div>
    </div>
</main>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script type="text/javascript" src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>

<!-- Jquery, Popper, Bootstrap -->
<script type="text/javascript" src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script type="text/javascript" src="{{ asset('js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/slick.min.jsjs') }}"></script>
<!-- Date Picker -->
<script type="text/javascript" src="{{ asset('js/gijgo.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/animated.headline.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script type="text/javascript" src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script type="text/javascript" src="{{ asset('js/contact.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.form.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mail-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>

