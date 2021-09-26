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

                        <div class="row">
                            <div class="col">
                                <div class="card mx-auto">
                                    <div class="card-body container">
                                        <div class="row">
                                            <div class="col text-center"><h3>Total sales: RM {{ number_format($totalSales, 2) }}</h3></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form class="my-3" method="GET" action="{{ route('admin.reports.menu-item-sales') }}">
                            <input type="search" name="search" class="form-control" placeholder="Search email..." value="{{ $search }}">
                            <small><i>Press enter to search</i></small>
                        </form>

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Quantity Sold</th>
                                    <th>Unit Price</th>
                                    <th>Total Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($menuItems->count() > 0)
                                @foreach($menuItems as $item)
                                <tr>
                                    <td>
                                        {{ $item->id }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->orderItems->count() }}
                                    </td>
                                    <td>
                                        RM {{ number_format($item->price, 2) }}
                                    </td>
                                    <td>
                                        RM {{ number_format($item->orderItems->count() * $item->price, 2) }}
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