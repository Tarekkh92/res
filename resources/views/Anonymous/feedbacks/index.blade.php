@extends('layouts.app')

@section('content')
        <h1>Feedbacks!</h1>
        {{-- @if(count($feedback)>0)
        @foreach($feedback as $feedbacka)
            <div class="well">
            <h3>
            <a href="/feedbacks/{{$feedbacka->id}}"> {{$feedbacka->fullName}}</a>
          
            </h3>
            <small>Written on {{$feedbacka->created_at}}</small>
          
            </div>
            @endforeach
            @else
            <p>No Feedbacks Found</p>
            @endif --}}
        
            <h3>Your Feedbacks</h3>
                    @if(count($feedback) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>service Rate</th>
                                <th>service Food</th>
                                <th>service sanitation</th>
                                <th>service Music</th>
                                <th>your Description</th>
                                <th>Feedback Average </th>
                                
                            </tr>
                            @foreach($feedback as $feedbacka)
                                <tr>
                                    <td>{{$feedbacka->serviceRate}}</td>
                                    <td>{{$feedbacka->foodRate}}</td>
                                    <td>{{$feedbacka->sanitationRate}}</td>
                                    <td>{{$feedbacka->musicRate}}</td>
                                    <td>{{$feedbacka->body}}</td>
                                    <td>{{$feedbacka->averageUser}}</td>
                                  
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no Feedbacks</p>
                    @endif
            
@endsection
