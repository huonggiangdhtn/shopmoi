<?php

namespace App\Modules\Shopping\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'photo', 'status'];
}
