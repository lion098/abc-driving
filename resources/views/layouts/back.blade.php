<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/links/jquery-timepicker-1.14.0/jquery.timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/back/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/links/bootstrap@5.2.3.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/links/fontawesome-free-6.4.0/css/all.min.css')}}">
    <title>{{config('app.name')}} CMS</title>
</head>

<body>
    @auth('cms')
        @include('back.includes.nav')
    @endauth

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

    <script src="{{asset('assets/links/bootstrap@5.2.3.min.js')}}"></script>
    <script src="{{asset('assets/links/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('assets/links/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/links/jquery-timepicker-1.14.0/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('assets/back/script.js')}}"></script>
</body>

</html>
