@extends('layouts.admin')

@section('content')
        <h1>Feedbacks!</h1>
       
            <h3>Your Feedbacks</h3>
                    @if(count($feedback) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>fullname</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>service Rate</th>
                                <th>service Food</th>
                                <th>service sanitation</th>
                                <th>service Music</th>
                                <th>your Description</th>
                                <th>Feedback Average </th>
                                <th>Restauarant's ID </th>
                            </tr>
                            @foreach($feedback as $feedbacka)
                                <tr>
                                    <td>{{$feedbacka->fullName}}</td>
                                    <td>{{$feedbacka->email}}</td>
                                    <td>{{$feedbacka->phone}}</td>
                                    <td>{{$feedbacka->serviceRate}}</td>
                                    <td>{{$feedbacka->foodRate}}</td>
                                    <td>{{$feedbacka->sanitationRate}}</td>
                                    <td>{{$feedbacka->musicRate}}</td>
                                    <td>{{$feedbacka->body}}</td>
                                    <td>{{$feedbacka->averageUser}}</td>
                                    <td>{{$feedbacka->restaurantID}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no Feedbacks</p>
                    @endif
                    {{-- {{$feedback->render()}} --}}
@endsection
