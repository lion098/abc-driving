@extends('layouts.back')

@section('content')
    <div class="container bg-white py-3 my-3 rounded-3">
        <div class="row">
            <div class="col">
                <h1>Features</h1>
            </div>
            <div class="col-auto">
                <a href="{{route('cms.feature.create')}}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-2"></i>Add Feature
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($features->isNotEmpty())
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $feature)
                                <tr>
                                    <td>{{$feature->title}}</td>
                                    <td>{{Str::limit($feature->desc, 100)}}</td>
                                    <td>{{$feature->created_at->toDayDateTimeString()}}</td>
                                    <td>{{$feature->updated_at->toDayDateTimeString()}}</td>
                                    <td>
                                        <form action="{{route('cms.feature.destroy', [$feature->id])}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('cms.feature.edit', [$feature->id])}}" class="btn btn-dark btn-sm" title="Edit">
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
                    {{$features->links()}}
                @else
                    <h4 class="fst-italic text-muted">No data found.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
