@extends('layouts.back')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-9 offset-md-3 mx-auto">
                <div class="card">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Add Client</h5>
                    </div>
                    <div class="row">
                        <div class="col-5 mx-auto">
                            <form action="{{route('cms.clients.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="client_name" class="form-label">Client Name <code>*</code></label>
                                    <input type="text" name="client_name" id="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{old('client_name')}}" required>
                                    @error('client_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <code>*</code></label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone <code>*</code></label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="client_address" class="form-label">Address <code>*</code></label>
                                    <textarea type="text" name="client_address" id="client_address" class="form-control @error('client_address') is-invalid @enderror" required>{{old('client_address')}}</textarea>
                                    @error('client_address')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image <code>*</code></label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <div class="row" id="imgPreview"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="course_id" class="form-label">Select Course <code>*</code></label>
                                    <select name="course_id" id="course_id" class="form-select" required>
                                        <option value="">-- Select Course --</option>
                                        @foreach ($courses as $course)
                                            <option value="{{$course->id}}" @selected(old('course_id') == $course->id)>{{$course->course_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="from_time" class="form-label">Start Time <code>*</code></label>
                                    <input type="text" name="from_time" id="from_time" class="form-control @error('from_time') is-invalid @enderror" value="{{old('from_time')}}" required>
                                    @error('from_time')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="to_time" class="form-label">End Time <code>*</code></label>
                                    <input type="text" name="to_time" id="to_time" class="form-control @error('to_time') is-invalid @enderror" value="{{old('to_time')}}" required>
                                    @error('to_time')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-save me-2"></i>Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
