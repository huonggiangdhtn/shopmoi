<?php

namespace App\Modules\Shopping\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Productextend extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'old_price'];
}
