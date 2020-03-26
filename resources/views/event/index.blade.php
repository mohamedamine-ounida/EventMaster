@extends('Layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif

                <h1><center> liste des l'evenement</center> </h1>
                    <br>
                <div class="pull-right">
                    <center> <a href="{{url('Events/create')}}" class="btn btn-success"><h4>Nouveau event</h4></a></center>
                </div>
                    <div class="row">
                        @foreach($events as $event)
                        <div class="col-sm-6 col-md-4">
                            <br><br><br><br>
                            <h3 class="card-title" style="color:#1d68a7"> {{$event->titre}}</h3>
                            <div class="img-fluid">
                                <img src="{{asset('storage/'.$event->photo)}}" alt="" width="250" height="110">
                                <div class="caption">
                                    <p>
                                        <li>{{$event->brief}}
                                            <ul>by:<a href="{{url('Users',$event->user->id)}}"> {{$event->user->name}}</a></ul>
                                        </li>
                                    <form action="{{url('Events/'.$event->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <a href=" {{url('Events/'.$event->id)}}" class="btn btn-primary"> Show</a>
                                        @can('update', $event)&nbsp;
                                        <a href=" {{url('Events/'.$event->id.'/edit')}}" class="btn btn-warning"> Editer</a>
                                        @endcan
                                        @can('delete',$event)
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        @endcan
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach()
                    </div>
            </div>
        </div>
    </div>
@endsection
