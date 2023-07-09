@extends('layouts.front')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('front.index')}}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


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
                        <p class="mb-4">{{$about->description}}</p>
                        <div class="row g-2 mb-4 pb-2">
                            @foreach ($features as $feature)
                                <div class="col-sm-6">
                                    <i class="fa fa-check text-primary me-2"></i>{{$feature->title}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

@endsection
