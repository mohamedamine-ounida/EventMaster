<?php

namespace App\Http\Controllers;
use App\ticket;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    // Enregistrer une ticket
    public function add($id)
    {
        $ticket = new ticket;
        $ticket->user_id = auth()->user()->id;
        $ticket->event_id = $id;
        if (!Ticket::where('user_id', auth()->user()->id)->where('event_id', $id)->exists()) {
            $ticket->save();
            session()->flash('flashevent','ticket a été bien enregister !');
            return back();}
            else
            {
                session()->flash('flashevent','Déja enregister !');
                return back(); }
    }}

