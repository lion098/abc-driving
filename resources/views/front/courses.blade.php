@extends('layouts.front')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Courses</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('front.index')}}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Courses</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Courses Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">Tranding Courses</h6>
                <h1 class="display-6 mb-4">Our Courses Upskill You With Driving Training</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse ($courses as $course)
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
                @empty
                    <h4 class="text-danger text-center">Courses Not Added.</h4>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Courses End -->

@endsection
