<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Post\PostStatus;
use App\Enums\Post\PostFeatured;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'slug',
        'is_featured',
        'status',
        'image',
        'excerpt',
        'content',
        'posted_at',
        'created_at',
        'updated_at',
    ];
    
    protected $casts = [
        'status' => PostStatus::class,
        'is_featured' => PostFeatured::class,
    ];

}
