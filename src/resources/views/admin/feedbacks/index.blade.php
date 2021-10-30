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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Rating</th>
                                    <th>Friendliness of staffs</th>
                                    <th>Quality of food</th>
                                    <th>Value for money</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($feedbacks->count() > 0)
                                @foreach($feedbacks as $feedback)
                                <tr>
                                    <td>
                                        @if (empty($feedback->name))
                                        <i>(Anonymous)</i>
                                        @else
                                        {{ $feedback->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (empty($feedback->email))
                                        <i>N/A</i>
                                        @else
                                        {{ $feedback->email }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $feedback->rating }} / 10
                                    </td>
                                    <td>
                                        {{ $feedback->friendliness_of_staff }} / 10
                                    </td>
                                    <td>
                                        {{ $feedback->quality_of_food }} / 10
                                    </td>
                                    <td>
                                        {{ $feedback->value_for_money }} / 10
                                    </td>
                                    <td>
                                        {{ $feedback->message }}
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