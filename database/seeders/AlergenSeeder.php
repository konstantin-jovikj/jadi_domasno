<?php

namespace Database\Seeders;

use App\Models\Alergen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $alergens = [
            ['alergen_name' => 'Млеко'],
            ['alergen_name' => 'Јајца'],
            ['alergen_name' => 'Риба'],
            ['alergen_name' => 'Морски Плодови'],
            ['alergen_name' => 'Јаткасти плодови'],
            ['alergen_name' => 'Пченица'],
            ['alergen_name' => 'Соја'],
            ['alergen_name' => 'Јагоди'],
        ];

        Alergen::insert($alergens);
    }
}

