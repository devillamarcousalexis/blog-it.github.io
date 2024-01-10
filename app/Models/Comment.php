<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_comment';
    protected $primaryKey = 'comment_id';
    protected $fillable = [
        'blog_id', 'comment_content', 'user_image'
    ];
    protected $guarded = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'blog_id');
    }
}
