<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author_id', 'content', 'category', 'status', 'publish_date', 'views_count',
        'reading_time', 'featured', 'featured_image'
    ];

    public function author()
    {
        return $this->belongsTo(TeamMember::class, 'author_id');
    }
}