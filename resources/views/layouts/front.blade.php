<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/front/default/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/front/default/lib/animate/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/default/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/front/default/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/front/default/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>{{$sitesettingdata->address}}</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>{{$sitesettingdata->timing}}</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>{{$sitesettingdata->contact}}</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    @if ($sitesettingdata->fb_url)
                        <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" target="_blank" href="{{$sitesettingdata->fb_url}}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if ($sitesettingdata->youtube_url)
                        <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" target="_blank" href="{{$sitesettingdata->youtube_url}}"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if ($sitesettingdata->insta_url)
                        <a class="btn btn-square btn-link rounded-0" target="_blank" href="{{$sitesettingdata->insta_url}}"><i class="fab fa-instagram"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="{{route('front.index')}}" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <h2 class="m-0"><i class="fa fa-car text-primary me-2"></i>{{config('app.name')}}</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('front.index')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('front.aboutUs')}}" class="nav-item nav-link">About</a>
                <a href="{{route('front.courses')}}" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="{{route('front.features')}}" class="dropdown-item">Features</a>
                        <a href="{{route('front.teams')}}" class="dropdown-item">Our Team</a>
                    </div>
                </div>
                <a href="{{route('front.client')}}" class="nav-item nav-link">Clients</a>
            </div>
            <a href="{{route('front.contact')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Contact<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <div class="position-fixed bottom-0 start-0 px-3 py-3">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="toast align-items-center text-bg-danger toast-dismissible fade show border-0 mb-1" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{$error}}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endforeach
        @endif

        @include('flash::message')
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6">
                    <h4 class="text-white mb-4">Get In Touch</h4>
                    <h2 class="text-primary mb-4"><i class="fa fa-car text-white me-2"></i>{{config('app.name')}}</h2>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{$sitesettingdata->address}}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{$sitesettingdata->contact}}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{$sitesettingdata->email}}</p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="{{route('front.aboutUs')}}">About Us</a>
                    <a class="btn btn-link" href="{{route('front.contact')}}">Contact Us</a>
                    <a class="btn btn-link" href="{{route('front.client')}}">Clients</a>
                    <a class="btn btn-link" href="{{route('front.courses')}}">Courses</a>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h4 class="text-light mb-4">Follow Us</h4>
                    <div class="d-flex pt-2">
                        @if ($sitesettingdata->fb_url)
                            <a class="btn btn-square btn-outline-light me-1" target="_blank" href="{{$sitesettingdata->fb_url}}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if ($sitesettingdata->youtube_url)
                            <a class="btn btn-square btn-outline-light me-1" target="_blank" href="{{$sitesettingdata->youtube_url}}"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if ($sitesettingdata->insta_url)
                            <a class="btn btn-square btn-outline-light me-0" target="_blank" href="{{$sitesettingdata->insta_url}}"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/front/default/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/front/default/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/front/default/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/front/default/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/front/default/js/main.js')}}"></script>
</body>

</html>
