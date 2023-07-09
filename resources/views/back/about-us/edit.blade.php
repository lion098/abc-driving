@extends('layouts.back')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-9 offset-md-3 mx-auto">
                <div class="card">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Edit About Us</h5>
                    </div>
                    <div class="row">
                        <div class="col-9 mx-auto">
                            <form action="{{route('cms.about.update', [$about->id])}}" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <code>*</code></label>
                                    <textarea type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required>{{old('title', $about->title)}}</textarea>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Short Description <code>*</code></label>
                                    <textarea type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{old('description', $about->description)}}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <div class="row" id="imgPreview">
                                        <div class="col-3 mt-3">
                                            <img src="{{asset('storage/images/'.$about->image)}}" alt="about-us image" class="img-fluid" />
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

<script>
    CKEDITOR.replace( 'description');
</script>
