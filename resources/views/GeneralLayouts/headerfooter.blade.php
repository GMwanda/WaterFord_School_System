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
    <title>SCHOOL MANAGEMENT SYSTEM</title>
</head>

<!--BODY-->

<body>
    <!--NAVIGATION-->
    <nav>
        <div class="container nav_container">
            <a href=""><img src="" alt="LOGO"></a>
            <ul class="nav_menu">
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Courses</a></li>
                <li><a href="">Contact</a></li>
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
        {{$slot}}
    </main>

    <!--FOOTER-->
    <footer>
        <div class="container footer_container">
            <!--FOOTER1-->
            <div class="footer1">
                <a href="/myHtml/index.html" class="footer_logo">
                    <h4>NAME</h4>
                </a>
                <P>
                    Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Enim porro rerum earum deleniti iste dolor
                    voluptas provident fuga doloribus. Explicabo?
                </P>
            </div>
            <!--FOOTER2-->
            <div class="footer2">
                <h4>links</h4>
                <ul class="plinks">
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Courses</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
            <!--FOOTER3-->
            <div class="footer3">
                <h4>privacy</h4>
                <ul class="privacy">
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Terms and Conditions</a></li>
                    <li><a href="">Refund Policy</a></li>
                </ul>
            </div>
            <!--FOOTER4-->
            <div class="footer4">
                <h4>contact us</h4>
                <div>
                    <p>+254 256-5896-85</p>
                    <p>school@gmail.com</p>
                </div>
                <ul class="social_links">
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
        </div>
        <div class="footer_copyright">
            <small>Copyright &copy; Josiah Development</small>
        </div>
    </footer>

    <!--NAVBAR JS-->
    <script src="ProgramStyling/headerfooter.js"></script>
</body>

</html>
