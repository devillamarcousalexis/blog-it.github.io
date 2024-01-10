<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_tags';
    protected $primaryKey = 'tags_id';
    protected $fillable = [
        'tags_name',
    ];
    protected $guarded = [
        'deleted_at', 'created_at', 'updated_at'
    ];
}
