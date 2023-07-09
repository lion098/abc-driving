@extends('layouts.back')

@section('content')
    <div class="container bg-white py-3 my-3 rounded-3">
        <div class="row">
            <div class="col">
                <h1>Testimonial</h1>
            </div>
            <div class="col-auto">
                <a href="{{route('cms.testimonial.create')}}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-2"></i>Add Testimonial
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($testimonials->isNotEmpty())
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>Client Name</th>
                                <th>Profession</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>{{$testimonial->name}}</td>
                                    <td>{{$testimonial->profession}}</td>
                                    <td>
                                        <img src="{{asset('storage/images/'.$testimonial->image)}}" alt="testimonial image" height="50px" width="50px">
                                    </td>
                                    <td>{{Str::limit($testimonial->desc, 100)}}</td>
                                    <td>{{$testimonial->created_at->toDayDateTimeString()}}</td>
                                    <td>{{$testimonial->updated_at->toDayDateTimeString()}}</td>
                                    <td>
                                        <form action="{{route('cms.testimonial.destroy', [$testimonial->id])}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('cms.testimonial.edit', [$testimonial->id])}}" class="btn btn-dark btn-sm" title="Edit">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm delete" title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$testimonials->links()}}
                @else
                    <h4 class="fst-italic text-muted">No data found.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
