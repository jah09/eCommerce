<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'price', 'images', 'is_active', 'category_id', 'brand_id','is_featured','in_stock','on_sale'];

    protected $casts = [
        'images' => 'array',
    ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
