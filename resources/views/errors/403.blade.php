@extends('Layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2" style="color: #dc0900">
            <center><h1>Cette page est non autoriser!</h1></center>
            <center><a href="{{url('Events')}}" style="color: #34dc2e" class="btn btn-block "><h4>Retour</h4></a></center>
        </div>
    </div>
</div>


@endsection
