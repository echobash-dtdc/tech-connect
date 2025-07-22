<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'role_title',
        'department_id',
        'team_id',
        'photo',
        'bio',
        'skills',
        'contact_number',
        'manager_id',
        'direct_reports',
        'linkedin_url',
        'active',
        'join_date'
    ];

    protected $casts = [
        'direct_reports' => 'array',
        'skills' => 'array',
    ];

    public function manager()
    {
        return $this->belongsTo(TeamMember::class, 'manager_id');
    }

    public function directReports()
    {
        return $this->hasMany(TeamMember::class, 'manager_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Recursive relationship for direct reports
    public function reports()
    {
        return $this->hasMany(TeamMember::class, 'manager_id');
    }

    // Recursive relationship with all descendants
    public function allReports()
    {
        return $this->reports()->with('allReports');
    }
}