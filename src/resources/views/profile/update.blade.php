@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="row mt-5">
    <div class="col">
        <div class="card mx-auto">
            <div class="card-body container">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">{{ $title }}</h5>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">First name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Michelle" value="{{ old('first_name') ?: $profile->first_name }}">
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Last name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Lim" value="{{ old('last_name') ?: $profile->last_name }}">
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="+01123456789" value="{{ old('phone') ?: $profile->phone }}">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Date of birth</label>
                                <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') ?: $profile->date_of_birth }}">
                                @error('date_of_birth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <input 
                                    type="text" 
                                    name="address" 
                                    class="form-control" 
                                    placeholder="2A, Jalan Tanjung 1, Taman Arnab, 93000, Ampang, Selangor" 
                                    value="{{ old('address') ?: $profile->address }}"
                                >
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection