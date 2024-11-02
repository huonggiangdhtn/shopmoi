<?php

namespace App\Modules\Tag\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagBlog extends Model
{
    use HasFactory;
    protected $fillable = ['tag_id','blog_id' ];
}
