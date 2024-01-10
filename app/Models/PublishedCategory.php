<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublishedCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_published_category';
    protected $primaryKey = 'published_category_id';
    protected $fillable = [
        'blog_id', 'category_id'
    ];
    protected $guarded = [
        'deleted_at', 'created_at', 'updated_at'
    ];
}
