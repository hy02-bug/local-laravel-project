@extends('layouts.template')

@section('main')

<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Showing all Milestone</h5>
            <!-- Create button -->
            {{-- <a href="{{route('milestones.create')}}" class="btn btn-primary">Add New Milestone</a> --}}
        </div>
        <table class="table table-striped">
            <tr>
                <th>Grant ID</th>
                <th>Milestone Name </th>
                <th>Target Date</th>
                <th>Deliverable</th>
                <th>Statuts</th>
                <th>Remark</th>
                <th>Last Updates</th>
                <th>Action</th>
            </tr>
            @foreach ($milestones as $milestone)
                <tr>
                    <td>{{ $milestone->grant_id}}</td>
                    <td>{{ $milestone->milestone_name}}</td>
                    <td>{{ $milestone->target_completion_date}}</td>
                    <td>{{ $milestone->deliverable}}</td>
                    <td>{{ $milestone->status}}</td>
                    <td>{{ $milestone->remark}}</td>
                    <td>{{ $milestone->updated_at}}</td>
                    <td>                                <!-- Show button -->
                        {{-- <a href="{{route('academicians.show',$academician)}}" class="btn btn-info btn-sm">Show</a> --}}

                        {{-- <!-- Edit button -->
                        <a href="{{route('milestones.edit',$milestone)}}" class="btn btn-warning btn-sm">Edit</a> --}}

                        <!-- Delete button -->
                        {{-- <form action="{{ route('milestones.destroy', $milestone) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                        </form> --}}

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
