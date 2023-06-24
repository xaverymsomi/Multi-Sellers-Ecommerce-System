<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function region()
    {
        return $this->belongsTo(ShipDivision::class, 'division_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(ShipDistricts::class, 'district_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(ShipState::class, 'state_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // End Method
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }

}
