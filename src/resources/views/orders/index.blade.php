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

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>

                                    <th>Items</th>
                                    <th>Paid Amount</th>
                                    <th>Delivery Address</th>
                                    <th>Status</th>
                                    @if (Auth::user()->is_admin)
                                    <th>User</th>
                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if($orders->count() > 0)
                                @foreach($orders as $order)
                                <tr>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                    <td>    
                                        @foreach($order->items as $index => $item)
                                        <div>
                                            {{ $index + 1 }}. {{ $item->menuItem->name }} x {{ $item->quantity }}
                                        </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        RM {{ number_format($order->payment->amount, 2) }} <i>(Paid with: {{ $order->payment->cc_masked_pan }})</i>
                                    </td>
                                    <td>
                                        {{ $order->delivery_address }}
                                    </td>
                                    <td>
                                        @if ($order->status == 0)
                                        <span class="badge bg-warning">{{ $order->statusText }}</span>
                                        @elseif ($order->status == 1)
                                        <span class="badge bg-success">{{ $order->statusText }}</span>
                                        @endif
                                    </td>
                                    @if (Auth::user()->is_admin)
                                    <th>
                                        {{ $order->user->name }} ({{ $order->user->email }})
                                    </th>
                                    <th>
                                        <form method="POST" action="{{ route('admin.orders.complete', $order->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" {{ $order->status == 0 ? '': 'disabled' }}>Complete Order</button>
                                        </form>
                                    </th>
                                    @endif
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection