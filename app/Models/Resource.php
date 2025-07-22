<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'resource_name', 'type', 'description', 'url', 'access_instructions', 'owner_team_id',
        'documentation', 'access_level'
    ];

    public function ownerTeam()
    {
        return $this->belongsTo(TeamMember::class, 'owner_team_id');
    }
}