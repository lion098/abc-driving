@extends('layouts.front')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Our Clients</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('front.index')}}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Our Clients</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->



    <!-- Client Start -->
    <div class="container-xxl py-1">
        <div class="row justify-content-end">
            <div class="search-container col-3">
                <form action="{{ route('front.client.search') }}" method="GET" enctype="multipart/form-data" class="d-flex">
                    <input type="text" class="form-control me-2" name="search" placeholder="Search by client name">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">Our Clients</h6>
                <h1 class="display-6 mb-4">We Have Great Experience Of Driving</h1>
            </div>
            <div class="row g-0 team-items">
                @forelse ($clients as $client)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{route('front.client.inner', $client->slug)}}">
                            <div class="team-item position-relative">
                                <div class="position-relative">
                                    <img class="img-fluid" src="{{asset('storage/images/'.$client->image)}}" alt="">
                                </div>
                                <div class="bg-light text-center p-4">
                                    <h5 class="mt-2">{{$client->client_name}}</h5>
                                    <span>View Detail</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <h4 class="text-danger text-center">Clients Not Added.</h4>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Client End -->

@endsection
