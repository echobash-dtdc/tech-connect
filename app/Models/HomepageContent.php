<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name', 'content_type', 'title', 'content', 'image_icon', 'link_url',
        'display_order', 'active', 'start_date', 'end_date'
    ];
}