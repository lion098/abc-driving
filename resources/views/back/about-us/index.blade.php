@extends('layouts.back')

@section('content')
    <div class="container bg-white py-3 my-3 rounded-3">
        <div class="row">
            <div class="col">
                <h1>About Us</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($about->isNotEmpty())
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($about as $item)
                                <tr>
                                    <td>{{ Str::limit($item->title, 200) }}</td>
                                    <td>{!! Str::limit($item->description, 200) !!}</td>
                                    <td>
                                        <img src="{{asset('storage/images/'.$item->image)}}" alt="image" height="50px" width="50px">
                                    </td>
                                    <td>{{$item->updated_at->toDayDateTimeString()}}</td>
                                    <td>
                                        <a href="{{route('cms.about.edit', [$item->id])}}" class="btn btn-dark btn-sm" title="Edit">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$about->links()}}
                @else
                    <h4 class="fst-italic text-muted">No data found.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
