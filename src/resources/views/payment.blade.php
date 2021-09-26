@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="row mt-5">
    <div class="col">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-body container">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">{{ $title }}</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card mx-auto">
                            <div class="card-body container">
                                <div class="row">
                                    <div class="col text-center"><h3>RM {{ $cartTotalPrice }}</h3></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <form method="POST" action="{{ route('payment.create') }}">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Delivery Address</label>
                                <textarea name="delivery_address" class="form-control" required>{{ old('delivery_address') }}</textarea>
                                @error('delivery_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Credit Card No.</label>
                                <input type="text" name="cc_pan" class="form-control" placeholder="4444333322221111" value="{{ old('cc_pan') }}" required>
                                @error('cc_pan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Expiry Month</label>
                                <input type="number" name="cc_exp_month" class="form-control" placeholder="12" value="{{ old('cc_exp_month') }}" required>
                                @error('cc_exp_month')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Expiry Year</label>
                                <input type="number" name="cc_exp_year" class="form-control" placeholder="2024" value="{{ old('cc_exp_year') }}" required>
                                @error('cc_exp_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">CVV</label>
                                <input type="number" name="cc_cvv" class="form-control" placeholder="123" value="{{ old('cc_cvv') }}" required>
                                @error('cc_cvv')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Name on card</label>
                                <input type="text" name="cc_name" class="form-control" placeholder="Michelle Lim Qian Bei" value="{{ old('cc_name') }}" required>
                                @error('cc_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div>
                                <button type="submit" class="btn btn-primary" style="width:100%">Pay</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection