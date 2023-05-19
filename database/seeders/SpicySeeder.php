<?php

namespace Database\Seeders;

use App\Models\Spicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $spicines = [
            ['spicylevel' => 'Не е луто'],
            ['spicylevel' => 'Малку луто'],
            ['spicylevel' => 'Луто'],
            ['spicylevel' => 'Пиканто / луто'],

        ];

        Spicy::insert($spicines);
    }

}
