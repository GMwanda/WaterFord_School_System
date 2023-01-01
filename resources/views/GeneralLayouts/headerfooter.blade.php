<!DOCTYPE html>
<html lang="en">

<!--HEAD-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="ProgramStyling/headerfooter.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="ProgramStyling/headerfooter.css">
    <title>WATERFORD</title>
</head>

<!--BODY-->

<body>
    <!--NAVIGATION-->
    <nav>
        <div class="container nav_container">
            <a class="navbar-brand fs-3 fw-bolder " href="{{ url('/') }}">
                {{ config('School', 'Waterford') }}
            </a>
            <ul class="nav_menu">
                {{-- <li><a href="/" class="text-decoration-none">Home</a></li> --}}
                <li><a href="/courses" class="text-decoration-none">Courses</a></li>
                <!--START-->
                <!-- Right Side Of Navbar -->
                <li class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                </li>

                <!--END-->

            </ul>
            <button id="open_menu_btn" title="Open menu">
                <i class='bx bx-menu'></i>
            </button>
            <button id="close_menu_btn" title="Close menu">
                <i class='bx bx-x'></i>
            </button>
        </div>
    </nav>

    <!--MAIN CONTENT-->
    <main>
        {{ $slot }}
    </main>

    <!--FOOTER-->
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
                            {{ config('School', 'WATERFORD') }}
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
                            <li><a href="/" class="text-white text-decoration-none fas fa-paw pe-3">Home</a>
                            </li>
                            <li><a href="/LoginPortal"
                                    class="text-white  text-decoration-none fas fa-paw pe-3">Login</a></li>
                            <li><a href="/courses" class="text-white  text-decoration-none fas fa-paw pe-3">Courses</a>
                            </li>
                            <li><a href="/contact" class="text-white  text-decoration-none fas fa-paw pe-3">Contact</a>
                            </li>
                            <li><a href="/home" class="text-white  text-decoration-none fas fa-paw pe-3">Student Portal</a>
                            </li>
                            {{-- <li><a href="/Staff" class="text-white  text-decoration-none fas fa-paw pe-3">Staff Portal</a>
                            </li> --}}
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column 3-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h4 class="fs-3 fw-bolder text-uppercase">privacy</h4>
                        <ul class="privacy fs-5">
                            <li><a href="" class="text-white  text-decoration-none fas fa-paw pe-3">Privacy
                                    Policy</a></li>
                            <li><a href="" class="text-white text-decoration-none fas fa-paw pe-3">Terms and
                                    Conditions</a>
                            </li>
                            <li><a href="" class="text-white  text-decoration-none fas fa-paw pe-3">Refund
                                    Policy</a></li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column 4-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h4 class="fs-3 fw-bolder text-uppercase">contact us</h4>
                        <div class="fs-5">
                            <p>+254 256-5896-85</p>
                            <p>waterford@gmail.com</p>
                        </div>


                        <a href="" class="p-2 fs-5"><i class='bx bxl-instagram-alt'></i></a>

                        <a href="" class="p-2 fs-5"><i class='bx bxl-twitter'></i></a>

                        <a href="" class="p-2 fs-5"><i class='bx bxl-facebook'></i></a>

                        <a href="" class="p-2 fs-5"><i class='bx bxl-linkedin-square'></i></a>


                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2020 Copyright:
                <a class="text-black text-decoration-none" href="">Waterford</a>
            </div>
            <!-- Copyright -->
        </footer>

    </div>
    <!-- End of .container -->

    <!--NAVBAR JS-->
    <script src="ProgramStyling/headerfooter.js"></script>
    <!--LINKING JS FILES-->
    <script src="/myJs/main.js"></script>
</body>

</html>
