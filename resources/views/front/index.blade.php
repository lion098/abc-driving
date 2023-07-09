@extends('layouts.front')

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if ($sliders->isNotEmpty())
                    @foreach ($sliders as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
                            <img class="w-100" src="{{asset('storage/images/'.$slider->image)}}" alt="Image">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <h1 class="display-2 text-light mb-5 animated slideInDown">{{$slider->title}}</h1>
                                            <a href="{{route('front.courses')}}" class="btn btn-light py-sm-3 px-sm-5 ms-3">Our Courses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="carousel-item active">
                        <img class="w-100" src="{{asset('assets/front/default/img/carousel-1.jpg')}}" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <h1 class="display-2 text-light mb-5 animated slideInDown">Learn To Drive With Confidence</h1>
                                        <a href="{{route('front.courses')}}" class="btn btn-light py-sm-3 px-sm-5 ms-3">Our Courses</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="{{asset('assets/front/default/img/carousel-2.jpg')}}" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <h1 class="display-2 text-light mb-5 animated slideInDown">Safe Driving Is Our Top Priority</h1>
                                        <a href="{{route('front.courses')}}" class="btn btn-light py-sm-3 px-sm-5 ms-3">Our Courses</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-car text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Easy Driving Learn </h5>
                                <span>Clita erat ipsum lorem sit sed stet duo justo erat amet</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-users text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>National Instructor</h5>
                                <span>Clita erat ipsum lorem sit sed stet duo justo erat amet</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-file-alt text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Get licence</h5>
                                <span>Clita erat ipsum lorem sit sed stet duo justo erat amet</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- About Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        @if (!empty($about->image))
                            <img class="position-absolute w-100 h-100" src="{{asset('storage/images/'.$about->image)}}" alt="" style="object-fit: cover;">
                        @else
                            <img class="position-absolute w-100 h-100" src="{{asset('assets/front/default/img/about-1.jpg')}}" alt="" style="object-fit: cover;">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase mb-2">About Us</h6>
                        <h1 class="display-6 mb-4">{{$about->title}}</h1>
                        <p class="mb-4">{!! Str::limit($about->description, 700) !!}</p>
                        <div class="row g-2 mb-4 pb-2">
                            @foreach ($features as $feature)
                                <div class="col-sm-6">
                                    <i class="fa fa-check text-primary me-2"></i>{{$feature->title}}
                                </div>
                            @endforeach
                        </div>
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <a class="btn btn-primary py-3 px-5" href="{{route('front.aboutUs')}}">Read More</a>
                            </div>
                            <div class="col-sm-6">
                                <a class="d-inline-flex align-items-center btn btn-outline-primary border-2 p-2" href="tel:{{$sitesettingdata->contact}}">
                                    <span class="flex-shrink-0 btn-square bg-primary">
                                        <i class="fa fa-phone-alt text-white"></i>
                                    </span>
                                    <span class="px-3">{{$sitesettingdata->contact}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Courses Start -->
    @if ($courses->isNotEmpty())
        <div class="container-xxl courses my-6 py-6 pb-0">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h6 class="text-primary text-uppercase mb-2">Tranding Courses</h6>
                    <h1 class="display-6 mb-4">Our Courses Upskill You With Driving Training</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                                <div class="text-center p-4 pt-0">
                                    <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">Rs.{{$course->price}}</div>
                                    <h5 class="mb-3">{{$course->course_name}}</h5>
                                    <p>{{$course->short_desc}}</p>
                                    <ol class="breadcrumb justify-content-center mb-0">
                                        <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i>{{$course->course_type}}</li>
                                        <li class="breadcrumb-item small"><i class="fa fa-calendar-alt text-primary me-2"></i>{{$course->days}} days</li>
                                    </ol>
                                </div>
                                <div class="position-relative mt-auto">
                                    <img class="img-fluid" src="{{asset('storage/images/'.$course->image)}}" alt="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Courses End -->

    <!-- Team Start -->
    @if ($staffs->isNotEmpty())
        <div class="container-xxl py-6">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h6 class="text-primary text-uppercase mb-2">Meet The Team</h6>
                    <h1 class="display-6 mb-4">We Have Great Experience Of Driving</h1>
                </div>
                <div class="row g-0 team-items">
                    @foreach ($staffs as $staff)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item position-relative">
                                <div class="position-relative">
                                    <img class="img-fluid" src="{{asset('storage/images/'.$staff->image)}}" alt="">
                                    <div class="team-social text-center">
                                        @if (!empty($staff->fb_url))
                                            <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{$staff->fb_url}}"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if (!empty($staff->twitter_url))
                                            <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{$staff->twitter_url}}"><i class="fab fa-twitter"></i></a>
                                        @endif
                                        @if (!empty($staff->insta_url))
                                            <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{$staff->insta_url}}"><i class="fab fa-instagram"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-light text-center p-4">
                                    <h5 class="mt-2">{{$staff->name}}</h5>
                                    <span>Trainer</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Team End -->

    <!-- Testimonial Start -->
    @if ($testimonials->isNotEmpty())
        <div class="container-xxl py-6">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h6 class="text-primary text-uppercase mb-2">Testimonial</h6>
                    <h1 class="display-6 mb-4">What Our Clients Say!</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="owl-carousel testimonial-carousel">
                            @foreach ($testimonials as $testimonial)
                                <div class="testimonial-item text-center">
                                    <div class="position-relative mb-5">
                                        <img class="img-fluid rounded-circle mx-auto" src="{{asset('storage/images/'.$testimonial->image)}}" alt="">
                                        <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                            <i class="fa fa-quote-left fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                    <p class="fs-4">{{$testimonial->desc}}</p>
                                    <hr class="w-25 mx-auto">
                                    <h5>{{$testimonial->name}}</h5>
                                    <span>{{$testimonial->profession}}</span>
                                </div>
                            @endforeach
                            {{-- <div class="testimonial-item text-center">
                                <div class="position-relative mb-5">
                                    <img class="img-fluid rounded-circle mx-auto" src="{{asset('assets/front/default/img/testimonial-2.jpg')}}" alt="">
                                    <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                        <i class="fa fa-quote-left fa-2x text-primary"></i>
                                    </div>
                                </div>
                                <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                                <hr class="w-25 mx-auto">
                                <h5>Client Name</h5>
                                <span>Profession</span>
                            </div>
                            <div class="testimonial-item text-center">
                                <div class="position-relative mb-5">
                                    <img class="img-fluid rounded-circle mx-auto" src="{{asset('assets/front/default/img/testimonial-3.jpg')}}" alt="">
                                    <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                        <i class="fa fa-quote-left fa-2x text-primary"></i>
                                    </div>
                                </div>
                                <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                                <hr class="w-25 mx-auto">
                                <h5>Client Name</h5>
                                <span>Profession</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Testimonial End -->

@endsection
