<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Dish;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }



    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'carts')->withTimestamps()->withPivot('quantity', 'dish_amount');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // public function cart()
    // {
    //     return $this->hasOne(Cart::class, 'carts')->withTimestamps();
    // }
}
