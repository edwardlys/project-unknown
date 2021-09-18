@extends('layouts.main-full-width')

@section('title', $title)

@section('content')
<div class="row">
    <div class="col">
        <div class="container-fluid">
            <div class="row">
                @foreach($menuItems as $item)
                <div class="col-4 mt-5 my-1">
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
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection