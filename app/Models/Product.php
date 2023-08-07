<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'category_img',
        'product_name',
        'category_id',
        'brand',
        'series',
        'product_status',
        'size',
        'item_status',
        'absence_condition',
        'wrapping_condition',
        'description',
        'prices',
        'shipping_fees',
        'delivery_method',
        'shipping_days',
        'product_number',
        'product_exhibit',
        'condition',
        'type',
        'favorite',
        'inventory',
        'created_at',
        'updated_at',
    ];
}
