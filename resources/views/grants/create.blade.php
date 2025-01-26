@extends('layouts.template')

@section('main')
<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

    <div class="px-3">

        <div class="pagetitle">
            <h1>Add grants</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('grants.index')}}">Grants</a></li>
                    <li class="breadcrumb-item active">create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('grants.store') }}" method="POST"  class="mt-3 needs-validation" novalidate>
                        @csrf

                        <div class="row mb-3">
                            <label for="Title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" id="Title" name="Title" class="form-control" required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter valid title
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Amount" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="number" id="Amount" name="Amount" class="form-control" step="0.01" required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter valid amount
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Provider" class="col-sm-3 col-form-label">Provider Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="Provider" name="Provider" class="form-control" required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter valid provider
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Start_Date" class="col-sm-3 col-form-label">Start date</label>
                            <div class="col-sm-9">
                                <input type="date" id="Start_Date" name="Start_Date" class="form-control" required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter valid date
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Duration_months" class="col-sm-3 col-form-label">Duration (Months)</label>
                            <div class="col-sm-9">
                                <input type="number" id="Duration_Months" name="Duration_months" class="form-control" required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter duration in months
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="project_leader_id" class="col-sm-3 col-form-label">Project Leader</label>
                            <div class="col-sm-9">
                                <select id="project_leader_id" name="project_leader_id" class="form-select" required>
                                    {{-- <option value="" selected disabled>Select Project Leader</option> --}}
                                    @foreach ($academicians as $academician)
                                        <option value="{{ $academician->id }}">{{ $academician->Name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" role="alert">
                                    Please enter valid ID
                                </div>
                            </div>
                        </div>


                        {{-- <div class="form-group mb-3">
                            <label for="project_members">Project Members</label>
                            <select id="project_members" name="project_members[]" class="form-control" multiple="multiple">
                                @foreach ($academicians as $academician)
                                    <option value="{{ $academician->id }}">{{ $academician->Name }}</option>
                                @endforeach
                            </select>
                            <p>Press Ctrl + click to select project members </p>
                        </div> --}}


                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

