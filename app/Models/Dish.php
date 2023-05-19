<?php

namespace App\Models;

use App\Models\Cook;
use App\Models\User;
use App\Models\Order;
use App\Models\Spicy;
use App\Models\Alergen;
use App\Models\Category;
use App\Models\Availability;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dish extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function spicyness()
    {
        return  $this->belongsTo(Spicy::class, 'spiciness_id');
    }

    public function alergens()
    {
        return $this->belongsToMany(Alergen::class, 'alergen_dish');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_dish');
    }

    public function availability()
    {
        return $this->hasMany(Availability::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'carts')->withTimestamps()->withPivot('quantity', 'dish_amount');
    }


    public function cook()
    {
        return $this->belongsTo(Cook::class, 'cook_id');
    }

    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments', 'dish_id', 'user_id')
            ->withPivot('rate_level', 'comment');
    }

    // public function cart()
    // {
    //     return $this->belongsTo(Cart::class);
    // }
}
