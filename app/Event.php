<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function session(){
        return $this->hasMany('App\Session');
    }

    public function ticket(){
        return $this->hasMany('App\Ticket');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($event) {
            $event->ticket()->delete();
            $event->session()->delete();
        });

    }
}

