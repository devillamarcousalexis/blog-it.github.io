<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_category';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_name'
    ];
    protected $guarded = [
        'deleted_at', 'created_at', 'updated_at'
    ];
}
