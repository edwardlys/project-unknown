@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="row mt-5">
    <div class="col">
        <div class="container-fluid">
            @foreach($menuItems as $item)
            <div class="row mt-5">
                <div class="col">
                    <div class="card mx-auto" style="width: 500px;">
                        <img src="{{ $item->image }}" class="card-img-top" height="500px" width="500px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">
                                {{ $item->description }}
                            </p>
                            <a href="#" class="btn btn-primary">Buy at RM {{ money_format('%n', $item->price) }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection