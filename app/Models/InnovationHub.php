<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InnovationHub extends Model
{
    use HasFactory;

    protected $table = 'innovation_hub';
    protected $fillable = [
        'idea_title', 'submitted_by', 'description', 'category', 'status', 'business_impact',
        'technical_feasibility', 'assigned_to', 'comments', 'attachments'
    ];

    public function submittedBy()
    {
        return $this->belongsTo(TeamMember::class, 'submitted_by_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(TeamMember::class, 'assigned_to_id');
    }
}