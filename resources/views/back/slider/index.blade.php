@extends('layouts.back')

@section('content')
    <div class="container bg-white py-3 my-3 rounded-3">
        <div class="row">
            <div class="col">
                <h1>Slider</h1>
            </div>
            <div class="col-auto">
                <a href="{{route('cms.slider.create')}}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-2"></i>Add Slider
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($slider->isNotEmpty())
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $item)
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td>
                                        <img src="{{asset('storage/images/'.$item->image)}}" alt="slider image" height="50px" width="50px">
                                    </td>
                                    <td>{{$item->created_at->toDayDateTimeString()}}</td>
                                    <td>{{$item->updated_at->toDayDateTimeString()}}</td>
                                    <td>
                                        <form action="{{route('cms.slider.destroy', [$item->id])}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('cms.slider.edit', [$item->id])}}" class="btn btn-dark btn-sm" title="Edit">
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
                    {{$slider->links()}}
                @else
                    <h4 class="fst-italic text-muted">No data found.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
