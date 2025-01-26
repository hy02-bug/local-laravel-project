@extends('layouts.template')

@section('main')
    <div class="px-3">
        <div class="pagetitle">
            <h1>Edit Project Leader</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('grants.index') }}">Grant</a></li>
                    <li class="breadcrumb-item active">Edit Project Leader</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('grants.updateLeader', $grant->id) }}" method="POST" class="mt-3 needs-validation" novalidate>
                        @csrf
                        @method('PATCH')

                        <!-- Project Leader -->
                        <div class="row mb-3">
                            <label for="project_leader_id" class="col-sm-3 col-form-label">Project Leader</label>
                            <div class="col-sm-9">
                                <select id="project_leader_id" name="project_leader_id" class="form-select" required>
                                    @foreach ($academicians as $academician)
                                        <option value="{{ $academician->id }}"
                                            {{ $grant->projectLeader && $grant->projectLeader->id == $academician->id ? 'selected' : '' }}>
                                            {{ $academician->Name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" role="alert">
                                    Please select a valid project leader.
                                </div>
                                @error('project_leader_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
