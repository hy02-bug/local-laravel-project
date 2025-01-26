@extends('layouts.template')

@section('main')
    <div class="px-3">
        <div class="pagetitle">
            <h1>Edit Grant Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('grants.index') }}">Grant</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('grants.update', $grant->id) }}" method="POST" class="mt-3 needs-validation" novalidate>
                        @csrf
                        @method('PATCH')
                        {{-- Title --}}
                        <div class="row mb-3">
                            <label for="Title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" id="Title" name="Title" class="form-control" value="{{ old('Title', $grant->Title) }}"required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter valid title
                                </div>
                            </div>
                        </div>
                        {{-- Amount --}}
                        <div class="row mb-3">
                            <label for="Amount" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="number" id="Amount" name="Amount" class="form-control" step="0.01" value="{{ old('Amount', $grant->Amount) }}"required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter valid amount
                                </div>
                            </div>
                        </div>
                        {{-- Provider --}}
                        <div class="row mb-3">
                            <label for="Provider" class="col-sm-3 col-form-label">Provider Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="Provider" name="Provider" class="form-control" value="{{ old('Provider', $grant->Provider) }}"required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter valid provider
                                </div>
                            </div>
                        </div>
                        {{-- Start Date --}}
                        <div class="row mb-3">
                            <label for="Start_Date" class="col-sm-3 col-form-label">Start date</label>
                            <div class="col-sm-9">
                                <input type="date" id="Start_Date" name="Start_Date" class="form-control" value="{{ old('Start_Date', $grant->Start_Date) }}"required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter valid date
                                </div>
                            </div>
                        </div>
                        {{-- Duration --}}
                        <div class="row mb-3">
                            <label for="Duration_months" class="col-sm-3 col-form-label">Duration (Months)</label>
                            <div class="col-sm-9">
                                <input type="number" id="Duration_Months" name="Duration_months" class="form-control" value="{{ old('Duration_months', $grant->Duration_months) }}"required>
                                <div class="invalid-feedback" role="alert">
                                    Please enter duration in months
                                </div>
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
