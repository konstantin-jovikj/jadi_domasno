<?php

namespace App\Models;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alergen extends Model
{
    use HasFactory;

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'alergen_dish');
    }
}
