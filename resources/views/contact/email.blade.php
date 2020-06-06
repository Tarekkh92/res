<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>


<h1>Your Feedback </h1>
<form>
<div>Fullname :  {{$feedback->fullName}}</div>
<div>Email :{{$feedback->email}}</div>
<div>Phone : {{$feedback->phone}}</div>
<div>Service Rate : {{$feedback->serviceRate}}</div>
<div>Food Rate : {{$feedback->foodRate}}</div>
<div>Sanitation Rate :  {{$feedback->sanitationRate}}</div>
<div>Music Rate : {{$feedback->musicRate}}</div>
<div>Body Message : {{$feedback->body}}</div>
</form>



</body>
</html>