<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpcomingEvents extends Model
{
    protected $table="upcoming_events";
    protected $fillable=['title','body','eventDate'];
}
