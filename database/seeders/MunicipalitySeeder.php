<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipality = [
            ['municipality' => 'Аеродром'],
            ['municipality' => 'Бутел'],
            ['municipality' => 'Гази Баба'],
            ['municipality' => 'Ѓорче Петров'],
            ['municipality' => 'Карпош'],
            ['municipality' => 'Кисела Вода'],
            ['municipality' => 'Сарај'],
            ['municipality' => 'Центар'],
            ['municipality' => 'Чаир'],
            ['municipality' => 'Шуто Оризари'],
        ];

        Municipality::insert($municipality);
    }
}
