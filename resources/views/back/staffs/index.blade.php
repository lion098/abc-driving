@extends('layouts.back')

@section('content')
    <div class="container bg-white py-3 my-3 rounded-3">
        <div class="row">
            <div class="col">
                <h1>Staffs</h1>
            </div>
            <div class="col-auto">
                <a href="{{route('cms.staffs.create')}}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-2"></i>Add Staff
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($staffs->isNotEmpty())
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td>{{$staff->name}}</td>
                                    <td>
                                        <img src="{{asset('storage/images/'.$staff->image)}}" alt="staff image" height="50px" width="50px">
                                    </td>
                                    <td>{{$staff->email}}</td>
                                    <td>{{$staff->phone}}</td>
                                    <td>{{$staff->address}}</td>
                                    <td>{{$staff->status}}</td>
                                    <td>{{$staff->created_at->toDayDateTimeString()}}</td>
                                    <td>{{$staff->updated_at->toDayDateTimeString()}}</td>
                                    <td>
                                        <form action="{{route('cms.staffs.destroy', [$staff->id])}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('cms.staffs.edit', [$staff->id])}}" class="btn btn-dark btn-sm" title="Edit">
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
                    {{$staffs->links()}}
                @else
                    <h4 class="fst-italic text-muted">No data found.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
