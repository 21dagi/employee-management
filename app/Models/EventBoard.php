<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBoard extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_title', 'event_description', 'event_date', 
        'event_time', '_location', 'organizer'
    ];
}
