@extends('Layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container ">
        <h2><center>les informations de l'evenement</center></h2>
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">Titre</div>
                <div class="panel-body">{{$event->titre}}</div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">User</div>
                <div class="panel-body"><a href="{{url('Users',$event->user->id)}}"> {{$event->user->name}}</a></div>
            </div>

            <div class="panel panel-danger">
                <div class="panel-heading">Brief</div>
                <div class="panel-body">{{$event->brief}}</div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">Content</div>
                <div class="panel-body">{{$event->content}}</div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Date de l'evenement</div>
                <div class="panel-body">{{$event->date}}</div>
            </div>

            <div class="panel panel-warning">
                <div class="panel-heading">Date de creation && date de mise ajour</div>
                <div class="panel-body">{{$event->user->created_at}} && {{$event->user->updated_at}}</div>
            </div>

            <div class="panel panel-danger">
                <div class="panel-heading">Country</div>
                <div class="panel-body">{{$event->country}}</div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">City</div>
                <div class="panel-body">{{$event->city}}</div>
            </div>

            <div class="panel panel-warning ">
                <div class="panel-heading">Speaker</div>
                <div class="panel-body">{{$event->speaker}}</div>
            </div>



            <div class="panel panel-info ">
                <div class="panel-heading">Session:

                    <form action="{{action('SessionController@create', $event->id)}}" method="Post">
                        {{csrf_field()}}
                        @if(Auth::user()->id==$event->user_id)
                    <center><button type="submit" class="btn btn-primary">Ajouter une session</button></center>
                        @endif
                    </form>


                </div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row row-cols-3 p-0">
                            @foreach($event->session as $session)

                            <div class="col w-50 ">
                                <br><br>
                                <div class="row ">
                                    <div class="col-9  ">
                                <h3 class="text-break" >session:{{$session->titre}}</h3>
                                <p class="text-break">{{$session->centent}}</p>
                                        <div class="row">
                                            <center>
                                                @can('delete', $session)
                                              <form action="{{action('SessionController@destroy',$session)}}" method="POST" >
                                                  @csrf

                                                <button type="submit" class="btn btn-outline-danger">SUPPRIMER</button>

                                              </form>
                                                @endcan
                                          </center>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-warning ">
            <div class="panel-heading">les tickets</div>
            <div class="panel-body">
                @if(count($event->ticket)>0)
            @foreach($event->ticket as $ticket)
                        <h7> <a href="{{url('Users',$ticket->user->id)}}">{{$ticket->user->name}}</a><br></h7>
                @endforeach
                    @else
                <h7>vide</h7>
                    @endif
            </div>
        </div>

            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">Action</div>
                    <div class="panel-body">
                        <center>

                            <form action="{{action('TicketController@add', $event->id)}}" method="post" >
                                <a href="{{url('Events')}}" style="color: #f8fff1" class="btn btn-danger">Retour liste de l'evenement</a>
                                {{csrf_field()}}
                            <button type="submit" class="btn btn-warning">Prenez un ticket!</button>
                            </form>
                        </center>
                    </div>
                </div>
        </div>
    </div>
    </body>
    </html>
@endsection
