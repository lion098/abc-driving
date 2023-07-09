@extends('layouts.back')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-9 offset-md-3 mx-auto">
                <div class="card">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Edit Course</h5>
                    </div>
                    <div class="row">
                        <div class="col-5 mx-auto">
                            <form action="{{route('cms.courses.update', [$course->id])}}" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="mb-3">
                                    <label for="course_name" class="form-label">Course Name <code>*</code></label>
                                    <input type="text" name="course_name" id="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{old('course_name', $course->course_name)}}" required>
                                    @error('course_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="course_type" class="form-label">Course Type <code>*</code></label>
                                    <input type="text" name="course_type" id="course_type" class="form-control @error('course_type') is-invalid @enderror" value="{{old('course_type', $course->course_type)}}" required>
                                    @error('course_type')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="days" class="form-label">Duration (In days) <code>*</code></label>
                                    <input type="text" name="days" id="days" class="form-control @error('days') is-invalid @enderror" value="{{old('days', $course->days)}}" required>
                                    @error('days')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price <code>*</code></label>
                                    <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price', $course->price)}}" required>
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="short_desc" class="form-label">Short Description <code>*</code></label>
                                    <textarea type="text" name="short_desc" id="short_desc" class="form-control @error('short_desc') is-invalid @enderror" required>{{old('short_desc', $course->short_desc)}}</textarea>
                                    @error('short_desc')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image <code>*</code></label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <div class="row" id="imgPreview">
                                        <div class="col-3 mt-3">
                                            <img src="{{asset('storage/images/'.$course->image)}}" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-save me-2"></i>Update
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
