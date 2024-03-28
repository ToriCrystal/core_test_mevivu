<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Supports\Eloquent\Sluggable;
use App\Enums\DefaultStatus;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'posts';
    protected $guarded = [];
    protected $columnSlug = 'title';

    protected $casts = [
        'status' => DefaultStatus::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'posted_at' => 'datetime'
    ];

    public function isPublished(){
        return $this->status == DefaultStatus::Published;
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }


    public function scopePublished($query){
        return $query->where('status', DefaultStatus::Published);
    }

    public function scopeHasCategories($query, array $categoriesId){
        return $query->whereHas('categories', function($query) use($categoriesId) {
            $query->whereIn('id', $categoriesId);
        });
    }
}
