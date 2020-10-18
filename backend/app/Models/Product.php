<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'title', 'image', 'created_at', 'updated_at'];

    protected $appends = ['total_sales'];

    public function getTotalSalesAttribute()
    {
        return $this->lineItems->reduce(function ($carry, $lineItem) {
            $quantity = $lineItem->quantity;
            $price = floatval($lineItem->price);
            $discount = floatval($lineItem->total_discount);
            return $carry + ($quantity * $price) - $discount;
        }, 0);
    }

    public function lineItems()
    {
        return $this->hasMany('App\Models\LineItem');
    }
}
