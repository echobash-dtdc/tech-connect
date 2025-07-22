<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback_suggestions';

    protected $fillable = [
        'subject', 'submitted_by', 'type', 'description', 'priority', 'status',
        'assigned_to', 'response'
    ];


    public function assignedTo()
    {
        return $this->belongsTo(TeamMember::class, 'assigned_to_id');
    }
}