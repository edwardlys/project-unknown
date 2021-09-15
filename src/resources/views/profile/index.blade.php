@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="row mt-5">
    <div class="col">
        <div class="card mx-auto">
            <div class="card-body container">
                <div class="row">
                    <div class="col">
                        <h3>Account</h3>
                        <table class="table table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <th class="">
                                        Username:
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Email:
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Joined on:
                                    </th>
                                    <td>
                                        {{ $user->created_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-auto mt-5">
            <div class="card-body container">
                <div class="row">
                    <div class="col">
                        <h3>Profile</h3> 
                        <table class="table table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <th>
                                        Full Name:
                                    </th>
                                    <td>
                                        @if (!empty($profile->full_name))
                                        {{ $profile->full_name }} 
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Date of Birth
                                    </th>
                                    <td>
                                        @if (!empty($profile->date_of_birth))
                                        {{ $profile->date_of_birth }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Phone:
                                    </th>
                                    <td>
                                        @if (!empty($profile->phone))
                                        {{ $profile->phone }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Address:
                                    </th>
                                    <td>
                                        @if (!empty($profile->address))
                                        {{ $profile->address }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-grid mx-auto">
                            <a class="btn btn-secondary" href="{{ route('profile.update.page') }}">
                                Update profile information
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection