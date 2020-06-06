@extends('layouts.app')

@section('content')
<h1>{{$feedback->fullName}}</h1>
<small>Written on {{$feedback->created_at}}</small>
<hr/>
<div id="">
       
        <br/>
        <small>Full name: {{$feedback->fullName}}</small>
        <br/>
        <small>email: {{$feedback->email}}</small>
        <br/>
        <small>phone: {{$feedback->phone}}</small>
        <br/>
        <small>service: {{$feedback->serviceRate}}</small>
        <br/>
         <small>food: {{$feedback->foodRate}}</small>
        <br/>
        <small>sanitation: {{$feedback->sanitationRate}}</small>
        <br/>
        <small>music: {{$feedback->musicRate}}</small>
        <br/>
        <small>created_at:  {{$feedback->created_at}}</small> 
        <br/> 
</div>
<div>
        {!!$feedback->body!!}
</div>
       
@endsection
