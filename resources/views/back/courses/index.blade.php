@extends('layouts.back')

@section('content')
    <div class="container bg-white py-3 my-3 rounded-3">
        <div class="row">
            <div class="col">
                <h1>Courses</h1>
            </div>
            <div class="col-auto">
                <a href="{{route('cms.courses.create')}}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-2"></i>Add Course
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($allCourses->isNotEmpty())
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>Course Name</th>
                                <th>Image</th>
                                <th>Course Type</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Short Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCourses as $course)
                                <tr>
                                    <td>{{$course->course_name}}</td>
                                    <td>
                                        <img src="{{asset('storage/images/'.$course->image)}}" alt="course image" height="50px" width="50px">
                                    </td>
                                    <td>{{$course->course_type}}</td>
                                    <td>{{$course->days}}</td>
                                    <td>{{$course->price}}</td>
                                    <td>{{Str::limit($course->short_desc, 100)}}</td>
                                    <td>{{$course->created_at->toDayDateTimeString()}}</td>
                                    <td>{{$course->updated_at->toDayDateTimeString()}}</td>
                                    <td>
                                        <form action="{{route('cms.courses.destroy', [$course->id])}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('cms.courses.edit', [$course->id])}}" class="btn btn-dark btn-sm" title="Edit">
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
                    {{$allCourses->links()}}
                @else
                    <h4 class="fst-italic text-muted">No data found.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
