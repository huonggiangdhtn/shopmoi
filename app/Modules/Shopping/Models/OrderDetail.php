<?php

namespace App\Modules\Shopping\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['wo_id', 'product_id', 'quantity', 'price', 'expired_at', 'in_ids'];
}
