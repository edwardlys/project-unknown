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
                        <div class="d-grid mx-auto">
                            <a class="btn btn-secondary">
                                Edit Account Information
                            </a>
                        </div>
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
                                        @if (!empty($profile->first_name))
                                        {{ $profile->first_name }} 
                                        @endif

                                        @if (!empty($profile->last_name))
                                        {{ $profile->last_name }} 
                                        @endif

                                        @if (empty($profile->first_name) && empty($profile->last_name))
                                        N/A
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Date of Birth
                                    </th>
                                    <td>
                                        @if (!empty($profile->first_name))
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
                                        @if (!empty($profile->first_name))
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
                                        @if (!empty($profile->first_name))
                                        {{ $profile->address }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-grid mx-auto">
                            <a class="btn btn-secondary">
                                Edit Profile Information
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection