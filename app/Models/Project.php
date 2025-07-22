<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ---------------------
// Projects & Initiatives
// ---------------------
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name', 'description', 'status', 'domain', 'start_date', 'end_date', 'project_lead_id',
        'priority', 'visibility', 'case_study', 'outcomes_impact', 'architecture_diagram'
    ];

    public function projectLead()
    {
        return $this->belongsTo(TeamMember::class, 'project_lead_id');
    }

    public function teamMembers()
    {
        return $this->belongsToMany(TeamMember::class);
    }
}