@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="row mt-5">
    <div class="col">
        <div class="card mx-auto">
            <div class="card-body container">
                <div class="row">
                    <div class="col">
                        <h3>
                            {{ $title }}
                        </h3>

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($cartItems) > 0)
                                @foreach($cartItems as $key => $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item->menuItem->image }}" width="250px" height="250px">
                                    </td>
                                    <td>
                                        {{ $item->menuItem->name }}
                                    </td>
                                    <td>
                                        RM {{ number_format($item->menuItem->price, 2) }}
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.remove', $key) }}">
                                            @csrf
                                            <button class="btn btn-danger">Remove item</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <i>Nothing to show here...</i>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <strong><i>Total:</i></strong>
                                    </td>
                                    <td>
                                        <strong><i>RM {{ number_format($cartTotalPrice, 2) }}<i></strong>
                                    </td>
                                    <td>
                                        <form method="GET" action="{{ route('payment') }}">
                                            <button type="submit" class="btn btn-primary" {{ count($cartItems) > 0 ? '': 'disabled' }}>Checkout</button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('cart.clear') }}">
                        @csrf
                        <button class="btn btn-danger" style="width: 100%">Clear all items</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection