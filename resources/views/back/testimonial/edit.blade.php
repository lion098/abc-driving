@extends('layouts.back')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-9 offset-md-3 mx-auto">
                <div class="card">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Edit Testimonial</h5>
                    </div>
                    <div class="row">
                        <div class="col-5 mx-auto">
                            <form action="{{route('cms.testimonial.update', [$testimonial->id])}}" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Client Name <code>*</code></label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $testimonial->name)}}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="profession" class="form-label">Profession <code>*</code></label>
                                    <input type="text" name="profession" id="profession" class="form-control @error('profession') is-invalid @enderror" value="{{old('profession', $testimonial->profession)}}" required>
                                    @error('profession')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Description <code>*</code></label>
                                    <textarea type="text" name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" required>{{old('desc', $testimonial->desc)}}</textarea>
                                    @error('desc')
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
                                            <img src="{{asset('storage/images/'.$testimonial->image)}}" class="img-fluid" />
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
