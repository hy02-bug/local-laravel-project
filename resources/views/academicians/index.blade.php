@extends('layouts.template')

@section('main')

<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Showing all Academician</h5>
            <!-- Create button -->
            @can('create', \App\Models\Academician::class)
            <a href="{{route('academicians.create')}}" class="btn btn-primary">Add New Academician</a>
            @endcan
        </div>
        <table class="table table-striped">
            <tr>
                <th>Academician ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>College</th>
                <th>Department</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
            @foreach ($academicians as $academician)
                <tr>
                    <td>{{ $academician->id }}</td>
                    <td>{{ $academician->Name }}</td>
                    <td>{{ $academician->Email}}</td>
                    <td>{{ $academician->College }}</td>
                    <td>{{ $academician->Department}}</td>
                    <td>{{ $academician->Position}}</td>
                    <td>                                <!-- Show button -->
                        {{-- <a href="{{route('academicians.show',$academician)}}" class="btn btn-info btn-sm">Show</a> --}}
                        @can('update',$academician)
                        <!-- Edit button -->
                        <a href="{{route('academicians.edit',$academician)}}" class="btn btn-warning btn-sm">Edit</a>
                        @endcan
                        
                        @can('delete',$academician)
                        <!-- Delete button -->
                        <form action="{{ route('academicians.destroy', $academician) }}" method="POST" style="display:inline;">
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
