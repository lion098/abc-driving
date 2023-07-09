@extends('layouts.front')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Features</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('front.index')}}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Features</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Features Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-primary text-uppercase mb-2">Why Choose Us!</h6>
                    <h1 class="display-6 mb-4">Best Driving Training Agency In Your City</h1>
                    <p class="mb-5">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="row gy-5 gx-4">
                        @forelse ($features as $feature)
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary me-3">
                                        <i class="fa fa-check text-white"></i>
                                    </div>
                                    <h5 class="mb-0">{{$feature->title}}</h5>
                                </div>
                                <span>{{$feature->desc}}</span>
                            </div>
                        @empty
                            <h4 class="text-danger text-center">Features Not Added.</h4>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative overflow-hidden pe-5 pt-5 h-100" style="min-height: 400px;">
                        @if (!empty($about->image))
                            <img class="position-absolute w-100 h-100" src="{{asset('storage/images/'.$about->image)}}" alt="" style="object-fit: cover;">
                        @else
                            <img class="position-absolute w-100 h-100" src="{{asset('assets/front/default/img/about-1.jpg')}}" alt="" style="object-fit: cover;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

@endsection
