<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'description', 'price', 'stock'];

    // Example business logic: calculate discounted price
    public function getDiscountedPrice($discountPercentage)
    {
        return $this->price * (1 - $discountPercentage / 100);
    }

    // Check if stock is available
    public function isAvailable()
    {
        return $this->stock > 0;
    }
}
