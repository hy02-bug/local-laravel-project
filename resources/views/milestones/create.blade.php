@extends('layouts.template')

@section('main')
    <div class="px-3">
        <div class="pagetitle">
            <h1>Add Milestone</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('milestones.index') }}">Milestones</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('milestones.store') }}" method="POST" class="mt-3 needs-validation" novalidate>
                        @csrf

                        <!-- Hidden field to specify the source of the edit -->
                        <input type="hidden" name="source" value="grant.show">

                        <!-- Grant ID  -->
                        <div class="row mb-3">
                            <label for="Name" class="col-sm-3 col-form-label">Grant ID</label>
                            <div class="col-sm-9">
                                <input type="number" id="grant_id" name="grant_id" class="form-control" required>
                                <div class="invalid-feedback">Please enter an existing ID.</div>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="row mb-3">
                            <label for="milestone_name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="milestone_name" name="milestone_name" class="form-control" required>
                                <div class="invalid-feedback">Please enter a valid name.</div>
                            </div>
                        </div>

                        <!-- Completion Date -->
                        <div class="row mb-3">
                            <label for="target_completion_date" class="col-sm-3 col-form-label">Target Completion Date </label>
                            <div class="col-sm-9">
                                <input type="date" id="target_completion_date" name="target_completion_date" class="form-control" required>
                                </input>
                                <div class="invalid-feedback">Please select a valid date.</div>
                            </div>
                        </div>

                        <!-- Deliverable -->
                        <div class="row mb-3">
                            <label for="deliverable" class="col-sm-3 col-form-label">Deliverable</label>
                            <div class="col-sm-9">
                                <input type="text" id="deliverable" name="deliverable" class="form-control" required>
                                </input>
                                <div class="invalid-feedback">Please select a valid data.</div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="row mb-3">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select id="status" name="status" class="form-control" required>
                                    <option value="" disabled selected>Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>
                                <div class="invalid-feedback">Please select a valid position.</div>
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

