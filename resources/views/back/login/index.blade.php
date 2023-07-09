@extends('layouts.back')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 text-center">
                <a href="{{route('front.index')}}" class="btn btn-info px-5">
                    <h4>Home</h4>
                </a>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="card-title">Login</h3>
                        </div>
                        <hr>
                        <form action="{{route('cms.loginCheck')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="email" placeholder="Enter your email" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket me-2"></i>Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
