@extends('layouts.template')

@section('main')
    <div class="px-3">
        <div class="pagetitle">
            <h1>Edit Academician</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('academicians.index') }}">Academicians</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('academicians.update', $academician->id) }}" method="POST" class="mt-3 needs-validation" novalidate>
                        @csrf
                        @method('PATCH')

                        <!-- Name -->
                        <div class="row mb-3">
                            <label for="Name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="Name" name="Name" class="form-control" value="{{ old('Name', $academician->Name) }}" required>
                                <div class="invalid-feedback">Please enter a valid name.</div>
                                @error('Name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row mb-3">
                            <label for="Email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" id="Email" name="Email" class="form-control" value="{{ old('Email', $academician->Email) }}" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                                @error('Email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- College -->
                        <div class="row mb-3">
                            <label for="College" class="col-sm-3 col-form-label">College</label>
                            <div class="col-sm-9">
                                <select id="College" name="College" class="form-control" required>
                                    <option value="" disabled>Select College</option>
                                    <option value="UNITEN Putrajaya" {{ old('College', $academician->College) == 'UNITEN Putrajaya' ? 'selected' : '' }}>UNITEN Putrajaya</option>
                                    <option value="UNITEN KSHAS" {{ old('College', $academician->College) == 'UNITEN KSHAS' ? 'selected' : '' }}>UNITEN KSHAS</option>
                                </select>
                                <div class="invalid-feedback">Please select a valid college.</div>
                                @error('College')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Department -->
                        <div class="row mb-3">
                            <label for="Department" class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                                <select id="Department" name="Department" class="form-control" required>
                                    <option value="" disabled>Select Department</option>
                                    <option value="Computer Science" {{ old('Department', $academician->Department) == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                                    <option value="Engineering" {{ old('Department', $academician->Department) == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                    <option value="Business" {{ old('Department', $academician->Department) == 'Business' ? 'selected' : '' }}>Business</option>
                                    <option value="Mathematics" {{ old('Department', $academician->Department) == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                                    <option value="Artificial Intelligence" {{ old('Department', $academician->Department) == 'Artificial Intelligence' ? 'selected' : '' }}>Artificial Intelligence</option>
                                </select>
                                <div class="invalid-feedback">Please select a valid department.</div>
                                @error('Department')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="row mb-3">
                            <label for="Position" class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                                <select id="Position" name="Position" class="form-control" required>
                                    <option value="" disabled>Select Position</option>
                                    <option value="Professor" {{ old('Position', $academician->Position) == 'Professor' ? 'selected' : '' }}>Professor</option>
                                    <option value="Assoc Professor" {{ old('Position', $academician->Position) == 'Assoc Professor' ? 'selected' : '' }}>Associate Professor</option>
                                    <option value="Senior Lecturer" {{ old('Position', $academician->Position) == 'Senior Lecturer' ? 'selected' : '' }}>Senior Lecturer</option>
                                    <option value="Lecturer" {{ old('Position', $academician->Position) == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
                                </select>
                                <div class="invalid-feedback">Please select a valid position.</div>
                                @error('Position')
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
