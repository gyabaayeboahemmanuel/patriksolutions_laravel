<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable =[
        'blog_title',
        'blog_content',
        'blog_author',
        'blog_thumbnail',
        'blog_slug',
        'blog_status',
        'blog_view',
        'created_at',
    ];
}
