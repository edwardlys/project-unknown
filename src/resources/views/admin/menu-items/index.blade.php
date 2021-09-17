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

                            <a type="submit" class="btn btn-primary" href="{{ route('admin.menu-items.create') }}">
                                <i class="bi bi-plus"></i>
                                Create New
                            </a>
                        </h3>

                        <form class="my-3" method="GET" action="{{ route('admin.menu-items') }}">
                            <input type="search" name="search" class="form-control" placeholder="Search email..." value="{{ $search }}">
                            <small><i>Press enter to search</i></small>
                        </form>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Actions</th>
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
                                        {{ $item->description }}
                                    </td>
                                    <td>
                                        RM {{ $item->price }}
                                    </td>
                                    <td>
                                        {{ $item->image }}
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary" href="{{ route('admin.menu-items.update', $item->id) }}">Edit</a>
                                        <form method="POST" action="{{ route('admin.menu-items.delete', $item->id) }}">
                                            @csrf
                                            <button class="btn btn-danger">Delete</button>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection