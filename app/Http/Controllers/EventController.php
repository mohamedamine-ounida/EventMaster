<?php

namespace App\Http\Controllers;

use App\Event;
use App\Session;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\eventRequest;

class EventController extends Controller
{
   // login par entres les evenement
    public function __construct() {
        $this->middleware('auth');
}


    //lister les Event
    public function index() {
        $listevent=Event::all();

        return view('event.index',['events' => $listevent]);
    }

    //Affiche le formulaire de creation de Event
    public function create() {
        return view('event.create');
    }

    //Enregistrer une Event
    public function store(eventRequest $request) {
        $event = new Event();
        $event->titre = $request->input('titre');
        $event->brief = $request->input('brief');
        $event->content = $request->input('content');

        if($request->hasFile('photo')){
            $event->photo = $request->photo->store('image');
        }
        $event->date = $request->input('date');
        $event->country = $request->input('country');
        $event->city = $request->input('city');
        $event->speaker = $request->input('speaker');
        $event->user_id = Auth::user()->id;


        $event->save();

        session()->flash('flashevent','l"evenement a été bien enregister!');

        return redirect('Events');
    }

    // permet récupérer une Event puis de le mettre dans un le formulaire
    public function edit($id) {
        $event=Event::find($id);
        $this->authorize('update',$event);
        return view('event.edit',['event'=>$event]);
    }

    // permet de modifier une Event
    public function update(eventRequest $request, $id) {
        $event = Event::find($id);
        $event->titre = $request->input('titre');
        $event->brief = $request->input('brief');
        $event->content = $request->input('content');

        if($request->hasFile('photo')){
            $event->photo = $request->photo->store('image');
        }

        $event->date = $request->input('date');
        $event->country = $request->input('country');
        $event->city = $request->input('city');
        $event->speaker = $request->input('speaker');
        $event->save();

        session()->flash('flashevent','l"evenement a été bien Modifier!');
        return redirect('Events');

    }
    // permet de supprimer une Event
    public function destroy(Request $request ,$id) {
        $event = Event::find($id);
        $this->authorize('delete',$event);
        $event->delete();
        session()->flash('flashevent','l"evenement a été bien supprimier!');
        return redirect('Events');

    }



    public function show($id){
        $event=Event::find($id);
        $session = Session::find($id);
        return view('event.show',['event'=>$event],['session'=>$session]);

        }



}
