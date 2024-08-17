<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    use HasFactory;

    // Define the custom table name
    protected $table = 'products';

    // Define the attributes that should be cast to native types
    protected $casts = [
        'product_category_ids' => 'array',  // Cast to array or JSON
    ];

    // Method to get related categories
    public function getCategoriesAttribute()
    {
        return ProductCategory::whereIn('id', $this->product_category_ids)->get();
    }
}
