<?php

namespace App\Http\Controllers;

use App\Event;
use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //lister des session
    public function index() {
        $listsession=Session::all();
        return view('event.show',['sessions' => $listsession]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     */

    //Affiche le formulaire de creation de session
    public function create($id) {
        $event = Event::find($id);
        $session = Session::find($id);
        return view('session.create_session', compact('event','session'));
    }
    /**
     * Display the specified resource.
     *
     * @param $id
     *
     */

    //Enregistrer une session
    public function store(Request $request, $id){
        $session = new Session();
        $session->titre = $request->input('titre');
        $session->centent = $request->input('centent');
        $session->event_id=$id;
        $session->save();

        session()->flash('flashsession','Session a été bien enregister!');
        return back();
    }




    /**
     * Display the specified resource.
     *
     * @param $id
     *
     */

    // permet de supprimer une Session
    public function destroy($id) {
        $session = Session::find($id);
        $this->authorize('delete',$session);
        $session->delete();
        session()->flash('flashsession','session a été bien supprimier!');
        return back();
    }





}
