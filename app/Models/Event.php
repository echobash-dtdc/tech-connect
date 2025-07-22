<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name', 'type', 'description', 'date_time', 'duration', 'location_link', 'organizer_id',
        'registration_link', 'materials', 'status', 'attendee_limit'
    ];

    public function organizer()
    {
        return $this->belongsTo(TeamMember::class, 'organizer_id');
    }
}