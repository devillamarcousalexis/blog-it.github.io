<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Blog extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $table = 'tbl_blog';
    protected $primaryKey = 'blog_id';
    protected $fillable = [
        'user_id', 'blog_title', 'blog_content', 'user_image', 'user_name'
    ];
    protected $guarded = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function publishedCategories()
    {
        return $this->belongsToMany(PublishedCategory::class, 'tbl_published_category', 'blog_id', 'category_id');
    }

    public function publishedTags()
    {
        return $this->belongsToMany(PublishedTags::class, 'tbl_published_tags', 'blog_id', 'tags_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'blog_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function toSearchableArray()
    {
        return [
            'blog_title' => $this->blog_title,
            'blog_content' => $this->blog_content,
            'user_image' => $this->user_image,
            'user_name' => $this->user_name,
        ];
    }
}
