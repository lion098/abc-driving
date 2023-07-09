@extends('layouts.back')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-9 offset-md-3 mx-auto">
                <div class="card">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Site Settings</h5>
                    </div>
                    <div class="row">
                        <div class="col-9 mx-auto">
                            <form action="{{route('cms.sitesetting.update', [$siteSetting->id])}}" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="address" class="form-label">Address <code>*</code></label>
                                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address', $siteSetting->address)}}" required>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="timing" class="form-label">Timing <code>*</code></label>
                                        <input type="text" name="timing" id="timing" class="form-control @error('timing') is-invalid @enderror" value="{{old('timing', $siteSetting->timing)}}" required>
                                        @error('timing')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="contact" class="form-label">Contact <code>*</code></label>
                                        <input type="text" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror" value="{{old('contact', $siteSetting->contact)}}" required>
                                        @error('contact')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="email" class="form-label">Email <code>*</code></label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email', $siteSetting->email)}}" required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="fb_url" class="form-label">Facebook URL <code>*</code></label>
                                        <input type="text" name="fb_url" id="fb_url" class="form-control @error('fb_url') is-invalid @enderror" value="{{old('fb_url', $siteSetting->fb_url)}}" required>
                                        @error('fb_url')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="insta_url" class="form-label">Instagram URL <code>*</code></label>
                                        <input type="text" name="insta_url" id="insta_url" class="form-control @error('insta_url') is-invalid @enderror" value="{{old('insta_url', $siteSetting->insta_url)}}" required>
                                        @error('insta_url')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="youtube_url" class="form-label">Youtube URL <code>*</code></label>
                                        <input type="text" name="youtube_url" id="youtube_url" class="form-control @error('youtube_url') is-invalid @enderror" value="{{old('youtube_url', $siteSetting->youtube_url)}}" required>
                                        @error('youtube_url')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="google_map" class="form-label">Google Map URL <code>*</code></label>
                                        <textarea name="google_map" id="google_map" class="form-control @error('google_map') is-invalid @enderror" required>{{old('google_map', $siteSetting->google_map)}}</textarea>
                                        @error('google_map')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
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
