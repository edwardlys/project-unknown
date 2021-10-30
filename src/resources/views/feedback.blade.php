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
                        <span>How was our services?</span>
                    </div>
                </div>

                <hr>

                <form method="POST" action="{{ route('feedback.create') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Ali (Optional)" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="test@mail.com (Optional)" value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <input type="range" name="rating" class="form-range" min="0" max="10" step="1" value="0" required>
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted">Bad</small> 
                                    <small class="text-muted">Good</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Quality of food</label>
                                <input type="range" name="additional_ratings[quality_of_food]" class="form-range" min="0" max="10" step="1" value="0" required>
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted">Bad</small> 
                                    <small class="text-muted">Good</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Friendliness of staffs</label>
                                <input type="range" name="additional_ratings[friendliness_of_staff]" class="form-range" min="0" max="10" step="1" value="0" required>
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted">Bad</small> 
                                    <small class="text-muted">Good</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Value for money</label>
                                <input type="range" name="additional_ratings[value_for_money]" class="form-range" min="0" max="10" step="1" value="0" required>
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted">Bad</small> 
                                    <small class="text-muted">Good</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Attachment</label>
                                <input class="form-control" type="file" name="attachment">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div>
                                <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection