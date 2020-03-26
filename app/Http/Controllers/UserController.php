<?php

namespace App\Http\Controllers;

use App\Event;
use App\Session;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \ILLuminate\Http\Response
     */
    public function show($id){
        $user=User::find($id);
        $event=Event::find($id);
        $ticket=Ticket::find($id);
        return view('user.show_user',compact('user','event','ticket'));
    }

}
