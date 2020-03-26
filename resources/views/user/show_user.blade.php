@extends('Layouts.app')
@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container ">
    <h2><center>les information de: {{$user->name}}</center></h2>
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">les evenement de: {{$user->name}}</div>
            @foreach($user->event as $event)
            <div class="panel-body"> {{$event->titre}}</div>
                @endforeach
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">les tickets réserver de : {{$user->name}}</div>
            @foreach($user->ticket as $ticket)
            <div class="panel-body">  {{$ticket->event->titre}} </div>
                @endforeach
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">Action</div>
                <center>
                    <div class="panel-body"> <a href="{{url('Events')}}" style="color: #f8fff1" class="btn btn-warning">Retour liste de l'evenement</a></div>
                </center>
        </div>
        </div>
</div>
</body>
</html>
@endsection
