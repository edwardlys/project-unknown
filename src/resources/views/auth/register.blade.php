@extends('layouts.no-navbar')

@section('title', $title)

@section('content')
<div class="row mt-5">
    <div class="col">
        <div class="card mx-auto" style="width: 18rem;">
            <div class="card-body container">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">{{ $title }}</h5>
                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
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

                    <div class="row mt-3">
                        <div class="col text-center">
                            <a href="{{ route('login') }}">
                                I already have an account
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">or</div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{ route('home') }}">
                                Back to home page
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection