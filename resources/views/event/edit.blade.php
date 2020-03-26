@extends('Layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{url('Events/'.$event->id)}}"method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}

                    <div class="form-group  @if($errors->get('titre')) has-danger @endif">
                        <label for=""> Titre </label>
                        <input type="text" name="titre" class="form-control" value="{{$event->titre}}">
                        @if($errors->get('titre'))
                            @foreach($errors->get('titre') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if($errors->get('brief')) has-danger @endif">
                        <label for="">Brief</label>
                        <input type="text" name="brief" class="form-control" value="{{$event->brief}}">
                        @if($errors->get('brief'))
                            @foreach($errors->get('brief') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if($errors->get('content')) has-danger @endif">
                        <label for="">Content</label>
                        <textarea name="content" class="form-control">{{$event->content}}</textarea>
                        @if($errors->get('content'))
                            @foreach($errors->get('content') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>


                    <div class="form-group @if($errors->get('photo')) has-danger @endif">
                        <label for="">Image</label>
                        <input class="form-control" type="file" enctype="multipart/form-data" name="photo" value="{{$event->photo}}">
                        @if($errors->get('photo'))
                            @foreach($errors->get('photo') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if($errors->get('date')) has-danger @endif">
                        <label for="">Date de l'event</label>
                        <input type="date" name="date" class="form-control" value="{{$event->date}}">
                        @if($errors->get('date'))
                            @foreach($errors->get('date') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if($errors->get('country')) has-danger @endif">
                        <label for="">Country</label>
                        <input type="text" name="country" class="form-control" value="{{$event->country}}">
                        @if($errors->get('country'))
                            @foreach($errors->get('country') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if($errors->get('city')) has-danger @endif">
                        <label for="">City</label>
                        <input type="text" name="city" class="form-control" value="{{$event->city}}">
                        @if($errors->get('city'))
                            @foreach($errors->get('city') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if($errors->get('speaker')) has-danger @endif">
                        <label for="">Speaker</label>
                        <input type="text" name="speaker" class="form-control" value="{{$event->speaker}}">
                        @if($errors->get('speaker'))
                            @foreach($errors->get('speaker') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group" >
                        <input type="submit"  class="form-control btn btn-danger" value="Modifier">
                    </div>
                </form>


            </div>
        </div>
    </div>



@endsection
