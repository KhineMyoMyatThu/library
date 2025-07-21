<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('user/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('user/css/style.css')}}" rel="stylesheet">
<!--
    rating css
    <link rel="stylesheet" href="css/custom.css"> -->
</head>
<body>
  <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-dark" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- nav bar start -->
    <div class="">
    <nav class="navbar navbar-expand-lg navbar-gradient " id="nav-bar">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/pngimg.com - book_PNG51090.png" style="width: 50px;" alt=""></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-dark" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item"><a class="nav-link text-dark" href="#">Books</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="#">About</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="#">Blog</a></li>
        <li><a class="nav-link" href="#"></a></li>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-dark " type="submit">Search</button>
      </form>



{{--  If not logged in, show Sign up & Login --}}
@guest
    <div class="d-flex ms-auto">
        <a href="{{route('register')}}" class="btn btn-sm btn-dark ms-3">Sign Up</a>
        <a href="{{route('login')}}" class="btn btn-sm btn-dark ms-3">Login</a>
    </div>
@endguest



      <div class="dropdown">
        <a class="text-dark nav-link dropdown-toggle ms-3" href="#" role="btn"
          id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Browse
        </a>


        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item line-th" href="#">Something else here</a></li>
        </ul>
      </div>

       {{-- ✅ If user is logged in and has role "user" --}}
    @auth
    @if(Auth::check() && Auth::user()->role == 'user')
        <div class="nav-item dropdown ">
            <a href="#" class="nav-link text-dark dropdown-toggle  " data-bs-toggle="dropdown">
                <img src="{{ asset('user/img/blue_circle.avif') }}" style="width:50px" alt="" class="img-profile rounded-circle me-2">
                <span class="">{{ auth()->user()->name }}</span>
            </a>
             <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item line-th" href="#">Something else here</a></li>
            <form action="{{ route('logout')}}" method="POST" class="dropdown-item my-2">
                @csrf
                <button type="submit" class="btn hover-effect w-100">Logout</button>
            </form>
        </ul>

                {{--  Add your profile links --}}
                {{-- <a href="{{ route('userProfile#account') }}" class="dropdown-item my-2">Account Profile</a>
                <a href="{{ route('userProfile#edit') }}" class="dropdown-item my-2">Edit Profile</a>
                <a href="{{ route('userProfile#password') }}" class="dropdown-item my-2">Change Password</a> --}}

                {{--  Logout form --}}


        </div>
    @endif
    @endauth

    </div>


  </div>
</nav>


          <!-- <a class="nav-link active" aria-current="page" href="#">
            <img src="./img/blue_circle.avif" alt="" style="width: 50px;border-radius: 50%;">
          </a>
         -->
</div>
<!-- navbar end -->
@yield('content')

<!-- footer start -->
  <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-white mb-0">Library</h1>
                            <h1 class="text-white mb-0">Myanmar</h1>

                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number"
                                placeholder="Your Email">
                            <button type="submit"
                                class="btn btn-dark border-0 py-3 px-4 position-absolute rounded-pill text-white"
                                style="top: 0; right: 0;">Subscribe Now</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like us!</h4>
                        <p class="mb-4">typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Info</h4>
                        <a class="t-color text-white-50" href="">About Us</a>
                        <a class="t-color text-white-50" href="">Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="t-color text-white-50" href="">My Account</a>
                        <a class="t-color text-white-50" href="">Save</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: Example@gmail.com</p>
                        <p>Phone: +0123 4567 8910</p>
                        <p>Payment Accepted</p>
                        <img src="img/payment.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- footer end -->
</body>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('user/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{asset('user/js/main.js')}}"></script>
</html>
