@extends('Layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{action('SessionController@store', $event->id)}}"method="post" enctype="multipart/form-data">
                    {{method_field('POST')}}

                    {{csrf_field()}}

                    <div class="form-group ">
                        <label for=""> Titre de session</label>
                        <input type="text" name="titre" class="form-control" value="{{old('titre')}}">

                    </div>

                    <div class="form-group  ">
                        <label for="">content</label>
                        <textarea name="centent" class="form-control">{{old('centent')}}</textarea>

                    </div>

                    <div class="form-group ">
                        <input type="submit"  class="form-control btn btn-primary" value="Enregistrer Session">
                        <br><br>
                        <center><a href="{{url('Events/'.$event->id)}}" class="form-control btn btn-info" >Retour les information de l'evenement</a></center>
                    </div>
                </form>


            </div>
        </div>
    </div>



@endsection
