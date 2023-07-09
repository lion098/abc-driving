@extends('layouts.front')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Our Team</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('front.index')}}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Our Team</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">Meet The Team</h6>
                <h1 class="display-6 mb-4">We Have Great Experience Of Driving</h1>
            </div>
            <div class="row g-0 team-items">
                @forelse ($teams as $team)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{asset('storage/images/'.$team->image)}}" alt="">
                                <div class="team-social text-center">
                                    @if (!empty($team->fb_url))
                                        <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{$team->fb_url}}"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if (!empty($team->twitter_url))
                                        <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{$team->twitter_url}}"><i class="fab fa-twitter"></i></a>
                                    @endif
                                    @if (!empty($team->insta_url))
                                        <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{$team->insta_url}}"><i class="fab fa-instagram"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="bg-light text-center p-4">
                                <h5 class="mt-2">{{$team->name}}</h5>
                                <span>Trainer</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-danger text-center">Teams Not Added.</h4>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Team End -->


 @endsection
