<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('School Management System', 'Login') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        {{-- NAVBAR --}}
        {{--  --}}
        <nav class="navbar navbar-expand-md navbar-light bg-purple-400 shadow-sm text-uppercase fs-4">
            <div class="container">
                <a class="navbar-brand fs-3 fw-bolder " href="{{ url('/') }}">
                    {{ config('School', 'School') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <!--
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                                        </li>
                                                                    -->
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 min-vh-100 bg-purple-300">
            @yield('content')
        </main>


        <!-- FOOTER -->
        <div class="">
            <footer class="text-center text-lg-start bg-purple-500">
                <!-- Grid container -->
                <div class="container p-4">
                    <!--Grid row-->
                    <div class="row my-4">
                        <!--Grid column 1-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                            <a class="navbar-brand fs-3 fw-bolder text-uppercase" href="{{ url('/') }}">
                                {{ config('School', 'School') }}
                            </a>

                            <P class="text-lg">
                                Lorem ipsum dolor sit amet consectetur, adipisicing
                                elit. Enim porro rerum earum deleniti iste dolor
                                voluptas provident fuga doloribus. Explicabo?
                            </P>

                            <ul class="list-unstyled d-flex flex-row justify-content-center fs-5">
                                <li>
                                    <a class="text-black  px-2" href="#!">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-black  px-2" href="#!">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-black  ps-2" href="#!">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            </ul>

                        </div>
                        <!--Grid column-->

                        <!--Grid column 2-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h4 class="fs-3 fw-bolder text-uppercase">links</h4>
                            <ul class="fs-5">
                                <li><a href="/" class="text-black text-decoration-none fas fa-paw pe-3 ">Home</a>
                                </li>
                                <li><a href="/LoginPortal"
                                        class="text-black  text-decoration-none fas fa-paw pe-3">Login</a></li>
                                <li><a href="/courses"
                                        class="text-black  text-decoration-none fas fa-paw pe-3">Courses</a></li>
                                <li><a href="/contact"
                                        class="text-black  text-decoration-none fas fa-paw pe-3">Contact</a></li>
                            </ul>
                        </div>
                        <!--Grid column-->

                        <!--Grid column 3-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h4 class="fs-3 fw-bolder text-uppercase">privacy</h4>
                            <ul class="privacy fs-5">
                                <li><a href="" class="text-black  text-decoration-none fas fa-paw pe-3">Privacy
                                        Policy</a></li>
                                <li><a href="" class="text-black  text-decoration-none fas fa-paw pe-3">Terms and
                                        Conditions</a>
                                </li>
                                <li><a href="" class="text-black  text-decoration-none fas fa-paw pe-3">Refund
                                        Policy</a></li>
                            </ul>
                        </div>
                        <!--Grid column-->

                        <!--Grid column 4-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h4 class="fs-3 fw-bolder text-uppercase">contact us</h4>
                            <div class="fs-5">
                                <p>+254 256-5896-85</p>
                                <p>school@gmail.com</p>
                            </div>
                            <ul class="fs-5">
                                <li>
                                    <a href=""><i class='bx bxl-instagram-alt'></i></a>
                                </li>
                                <li>
                                    <a href=""><i class='bx bxl-twitter'></i></a>
                                </li>
                                <li>
                                    <a href=""><i class='bx bxl-facebook'></i></a>
                                </li>
                                <li>
                                    <a href=""><i class='bx bxl-linkedin-square'></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </div>
                <!-- Grid container -->

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                    © 2020 Copyright:
                    <a class="text-black text-decoration-none" href="">Josiah</a>
                </div>
                <!-- Copyright -->
            </footer>

        </div>
        <!-- End of .container -->

    </div>
</body>

</html>
