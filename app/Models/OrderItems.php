<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public static function getTotalOrdersForSeller($sellerName)
    {
        $totalOrders = OrderItems::where('seller_name', $sellerName)
            ->sum('price');
    
        return $totalOrders;
    }
    public static function getTotalOrdersForSellerName($sellerName)
    {
        $totalOrders = OrderItems::whereHas('seller', function ($query) use ($sellerName) {
            $query->where('name', $sellerName);
        })->sum('price');

        return $totalOrders;
    }

    public static function getTotalOrdersForShop($sellerId, $date)
    {
        $totalOrders = OrderItems::where('seller_id', $sellerId)
        ->whereHas('order', function ($query) use ($date) {
            $query->whereDate('order_date', $date);
        })
        ->sum('price');

    return $totalOrders;
    }
}
