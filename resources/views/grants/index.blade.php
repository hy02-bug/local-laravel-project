@extends('layouts.template')

@section('main')

<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Showing all Grants list</h5>
            @can('create', \App\Models\Grant::class)
            <!-- Create button -->
            <a href="{{route('grants.create')}}" class="btn btn-primary">Create Grant</a>
            @endcan
        </div>
        <table class="table table-striped">
            <tr>
                <th>Grant ID</th>
                <th>Title</th>
                <th>Amount (RM)</th>
                <th>Provider</th>
                <th>Project Leader</th>
                <th>Action</th>
            </tr>
            @foreach ($grants as $grant)
                <tr>
                    <td>{{ $grant->id }}</td>
                    <td>{{ $grant->Title }}</td>
                    <td>{{ $grant->Amount }}</td>
                    <td>{{ $grant->Provider }}</td>
                    <td>{{ $grant->project_leader_id}}</td>
                    <td>                                <!-- Show button -->
                        <a href="{{route('grants.show',$grant)}}" class="btn btn-info btn-sm">Show</a>
                        @can('delete',$grant)
                        <!-- Delete button -->
                        <form action="{{ route('grants.destroy', $grant) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this grant?')">Delete</button>
                        </form>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
