<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublishedTags extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_published_tags';
    protected $primaryKey = 'published_tags_id';
    protected $fillable = [
        'blog_id', 'tags_id'
    ];
    protected $guarded = [
        'deleted_at', 'created_at', 'updated_at'
    ];
}
