<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['status_type' => 'Нарaчката е успешно направена'],
            ['status_type' => 'Нарачката е прифатена'],
            ['status_type' => 'Нарачката е подготвена'],
            ['status_type' => 'Нарачката е во достава'],
            ['status_type' => 'Нарачката е доставена'],
        ];

        Status::insert($statuses);
    }
}
