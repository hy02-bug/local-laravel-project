@extends('layouts.template')

@section('main')
use Carbon\Carbon;

<div class="container">
    <h1>Grant Details</h1>

    <!-- Grant Details Card -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Grant Details</h4>
        </div>
        <div class="card-body">
            <p><strong>Title:</strong> {{ $grant->Title }}</p>
            <p><strong>Amount:</strong> RM{{ number_format($grant->Amount, 2) }}</p>
            <p><strong>Provider:</strong> {{ $grant->Provider }}</p>
            <p><strong>Start Date:</strong> {{ $grant->Start_Date }}</p>
            <p><strong>Duration (Months):</strong> {{ $grant->Duration_months }}</p>
            <p><strong>End Date:</strong>
                {{ \Carbon\Carbon::parse($grant->Start_Date)->addMonths($grant->Duration_months)->format('Y-m-d') }}
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-primary">Edit Grant Details</a>
        </div>
    </div>

<!-- Project Leader Card -->
<div class="card mb-4">
    <div class="card-header">
        <h4>Project Leader</h4>
    </div>
    <div class="card-body">
        @if ($grant->projectLeader)
            <p><strong>Name:</strong> {{ $grant->projectLeader->Name }}</p>
            <p><strong>Email:</strong> {{ $grant->projectLeader->Email }}</p>
            <p><strong>Position:</strong> {{ $grant->projectLeader->Position }}</p>
        @else
            <p><strong>Project Leader:</strong> Not Assigned</p>
        @endif
    </div>
    @can('create', \App\Models\Grant::class)
    <div class="card-footer">
        <a href="{{ route('grants.editLeader', $grant->id) }}" class="btn btn-primary">Edit Leader</a>
    </div>
    @endcan
</div>

<!-- Project Members Card -->
<div class="card mb-4">
    <div class="card-header">
        <h4>Project Members</h4>
    </div>
    <div class="card-body">
        @if ($grant->projectMember->isNotEmpty())
            <ol>
                @foreach ($grant->projectMember as $member)
                    <li>
                        <strong>Name:</strong> {{ $member->Name }}<br>
                        <strong>Email:</strong> {{ $member->Email }}<br>
                        <strong>Position:</strong> {{ $member->Position }}<br>
                        @can('deleteMember',$grant)
                        <form action="{{ route('grants.removeMember', ['grant' => $grant->id, 'academician' => $member->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this member?')">Remove</button>
                        </form>
                        @endcan

                    </li>
                @endforeach
            </ol>
        @else
            <p>No project members assigned.</p>
        @endif
    </div>
    @can('update',$grant)
    <div class="card-footer">
        <a href="{{ route('grants.showAddMemberForm', $grant->id) }}" class="btn btn-primary">Add Members</a>
    </div>
    @endcan
</div>

    <!-- Milestones Card -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Milestones</h4>
        </div>
        <div class="card-body">
            @if ($grant->milestone->isNotEmpty())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Milestone Name</th>
                            <th>Target Completion Date</th>
                            <th>Deliverable</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grant->milestone as $milestone)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $milestone->milestone_name }}</td>
                                <td>{{ $milestone->target_completion_date }}</td>
                                <td>{{ $milestone->deliverable }}</td>
                                <td>{{ $milestone->status }}</td>
                                <td>{{ $milestone->remark }}</td>
                                <td>
                                    @can('deleteMember',$grant)
                                    <!-- Edit button -->
                                    <a href="{{route('milestones.edit',$milestone)}}" class="btn btn-warning btn-sm">Edit</a>
                                    @endcan
                                    <!-- Line break -->
                                    @can('deleteMember',$grant)
                                    <!-- Delete button -->
                                    <form action="{{ route('milestones.destroy', $milestone) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No milestones added yet.</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('milestones.create', ['grant_id' => $grant->id]) }}" class="btn btn-primary">Add Milestone</a>
        </div>
    </div>
</div>
@endsection
