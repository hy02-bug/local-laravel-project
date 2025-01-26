@extends('layouts.template')

@section('main')
    <div class="px-3">
        <div class="pagetitle">
            <h1>Edit Member Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('grants.index') }}">Grant</a></li>
                    <li class="breadcrumb-item active">Edit Member</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('grants.storeMember', $grant->id) }}" method="POST" class="mt-3 needs-validation" novalidate>
                        @csrf
                        

                        <!-- Project Member -->
                        <div class="form-group mb-3">
                            <label for="member_id">Project Member</label>
                            <select id="project_member" name="project_member" class="form-control">
                                <option value="" disabled selected>Select a project member</option>
                                @foreach ($availableAcademicians as $member)
                                    <option value="{{ $member->id }}">
                                        {{ $member->Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project_member')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
