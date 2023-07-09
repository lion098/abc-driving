@extends('layouts.back')

@section('content')
    <div class="container bg-white py-3 my-3 rounded-3">
        <div class="row">
            <div class="col">
                <h1>Clients</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('cms.clients.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-2"></i>Add Client
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($clients->isNotEmpty())
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Timing</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Completed Days</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->client_name }}</td>
                                    <td>{{ $client->courses->course_name }}</td>
                                    <td>{{ $client->from_time . ' - ' . $client->to_time }}</td>
                                    <td>
                                        <img src="{{ asset('storage/images/' . $client->image) }}" alt="client image"
                                            height="50px" width="50px">
                                    </td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->client_address }}</td>
                                    <td>
                                        @if ($client->completed_days == 0)
                                            0
                                        @else
                                            {{ $client->completed_days }} days
                                        @endif
                                        <span>
                                            @if ($client->courses->days != $client->completed_days)
                                                {{-- add day --}}
                                                <a href="" class="btn btn-primary btn-sm addDay" title="Add Day" data-bs-toggle="modal" data-bs-target="#addDay">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="addDay" tabindex="-1" aria-labelledby="addDayLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title fs-5 text-danger" id="addDayLabel">Are you sure you want to add day of this client?</h6>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a href="{{ route('cms.client.addDay', $client->id) }}" class="btn btn-primary">Add</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($client->completed_days != 0)
                                                {{-- subtract day --}}
                                                <a href="" class="btn btn-danger btn-sm" title="Subtract Day" data-bs-toggle="modal" data-bs-target="#subtractDay">
                                                    <i class="fa-solid fa-minus"></i>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="subtractDay" tabindex="-1" aria-labelledby="subtractDayLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title fs-5 text-danger" id="subtractDayLabel">Are you sure you want to subtract day of this client?</h6>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a href="{{ route('cms.client.subtractDay', $client->id) }}" class="btn btn-primary">Subtract</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ $client->created_at->toDayDateTimeString() }}</td>
                                    <td>
                                        <form action="{{ route('cms.clients.destroy', [$client->id]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('cms.clients.edit', [$client->id]) }}"
                                                class="btn btn-dark btn-sm" title="Edit">
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
                    {{ $clients->links() }}
                @else
                    <h4 class="fst-italic text-muted">No data found.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
