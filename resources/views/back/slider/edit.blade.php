@extends('layouts.back')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-9 offset-md-3 mx-auto">
                <div class="card">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Edit Slider</h5>
                    </div>
                    <div class="row">
                        <div class="col-5 mx-auto">
                            <form action="{{route('cms.slider.update', [$slider->id])}}" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <code>*</code></label>
                                    <textarea type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required>{{old('title', $slider->title)}}</textarea>
                                    @error('title')
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
                                            <img src="{{asset('storage/images/'.$slider->image)}}" class="img-fluid" />
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
