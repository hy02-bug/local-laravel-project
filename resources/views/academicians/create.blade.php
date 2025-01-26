@extends('layouts.template')

@section('main')
    <div class="px-3">
        <div class="pagetitle">
            <h1>Add Academician</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('academicians.index') }}">Academicians</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('academicians.store') }}" method="POST" class="mt-3 needs-validation" novalidate>
                        @csrf

                        <!-- Name -->
                        <div class="row mb-3">
                            <label for="Name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="Name" name="Name" class="form-control" required>
                                <div class="invalid-feedback">Please enter a valid name.</div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row mb-3">
                            <label for="Email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" id="Email" name="Email" class="form-control" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                        </div>

                        <!-- College -->
                        <div class="row mb-3">
                            <label for="College" class="col-sm-3 col-form-label">College</label>
                            <div class="col-sm-9">
                                <select id="College" name="College" class="form-control" required>
                                    <option value="" disabled selected>Select College</option>
                                    <option value="UNITEN Putrajaya">UNITEN Putrajaya</option>
                                    <option value="UNITEN KSHAS">UNITEN KSHAS</option>
                                </select>
                                <div class="invalid-feedback">Please select a valid college.</div>
                            </div>
                        </div>

                        <!-- Department -->
                        <div class="row mb-3">
                            <label for="Department" class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                                <select id="Department" name="Department" class="form-control" required>
                                    <option value="" disabled selected>Select Department</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Business">Business</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                                </select>
                                <div class="invalid-feedback">Please select a valid department.</div>
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="row mb-3">
                            <label for="Position" class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                                <select id="Position" name="Position" class="form-control" required>
                                    <option value="" disabled selected>Select Position</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Assoc Professor">Associate Professor</option>
                                    <option value="Senior Lecturer">Senior Lecturer</option>
                                    <option value="Lecturer">Lecturer</option>
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

