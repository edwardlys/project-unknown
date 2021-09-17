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
                            User Management
                        </h3>

                        <form class="my-3" method="GET" action="{{ route('admin.users') }}">
                            <input type="search" name="search" class="form-control" placeholder="Search email..." value="{{ $search }}">
                            <small><i>Press enter to search</i></small>
                        </form>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users->count() > 0)
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                        @if ($user->is_admin)
                                        <span class="badge bg-success">Admin</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->created_at }}
                                    </td>
                                    <td>
                                        @if(!$user->is_admin)
                                        <form method="POST" action="{{ route('admin.users.make_admin', $user->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Make Admin</button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{ route('admin.users.remove_admin', $user->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Remove Admin</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="text-center">
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