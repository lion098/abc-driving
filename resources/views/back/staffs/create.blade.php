@extends('layouts.back')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-9 offset-md-3 mx-auto">
                <div class="card">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Add Staff</h5>
                    </div>
                    <div class="row">
                        <div class="col-5 mx-auto">
                            <form action="{{route('cms.staffs.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <code>*</code></label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                                    @error('name')
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
                                    <label for="new_password" class="form-label">New Password <code>*</code></label>
                                    <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                                    @error('new_password')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm Password <code>*</code></label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" required>
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
                                    <label for="address" class="form-label">Address <code>*</code></label>
                                    <textarea type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" required>{{old('address')}}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status <code>*</code></label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="Active" @selected(old('status') == 'Active')>Active</option>
                                        <option value="Inactive" @selected(old('status') == 'Inactive')>Inactive</option>
                                    </select>
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
                                    <label for="fb_url" class="form-label">Facebook URL </label>
                                    <input type="text" name="fb_url" id="fb_url" class="form-control @error('fb_url') is-invalid @enderror" value="{{old('fb_url')}}">
                                    @error('fb_url')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="insta_url" class="form-label">Instagram URL </label>
                                    <input type="text" name="insta_url" id="insta_url" class="form-control @error('insta_url') is-invalid @enderror" value="{{old('insta_url')}}">
                                    @error('insta_url')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="twitter_url" class="form-label">Twitter URL </label>
                                    <input type="text" name="twitter_url" id="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" value="{{old('twitter_url')}}">
                                    @error('twitter_url')
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
