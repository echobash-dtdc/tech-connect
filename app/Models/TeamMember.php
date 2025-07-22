<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'email', 'role_title', 'department', 'team', 'photo', 'bio', 'skills', 'contact_number',
        'manager_id', 'linkedin_url', 'active', 'join_date'
    ];

    public function manager()
    {
        return $this->belongsTo(TeamMember::class, 'manager_id');
    }

    public function directReports()
    {
        return $this->hasMany(TeamMember::class, 'manager_id');
    }
}