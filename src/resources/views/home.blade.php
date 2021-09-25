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

                            <form method="POST" action="{{ route('cart.add') }}">
                                <input type="hidden" name="menu_item_id" value="{{ $item->id }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Buy at RM {{ number_format($item->price, 2) }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection