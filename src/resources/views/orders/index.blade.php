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
                                        RM {{ number_format($order->payment->amount, 2) }}
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