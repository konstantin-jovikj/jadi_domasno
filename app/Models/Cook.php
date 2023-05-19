<?php

namespace App\Models;

use App\Models\Dish;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cook_avg_rating',
        'delivery_instructions',
        'web',
        'facebook',
        'instagram',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

}
