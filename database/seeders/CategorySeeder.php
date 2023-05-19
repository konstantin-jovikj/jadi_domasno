<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Традиционална Кујна'],
            ['category_name' => 'Вегетаријанска Кујна'],
            ['category_name' => 'Веганска Кујна'],
            ['category_name' => 'Десерти'],
            ['category_name' => 'Пецива'],
            ['category_name' => 'Италијанска Кујна'],
            ['category_name' => 'Здрава Храна'],
            ['category_name' => 'Безглутенска Храна'],
            ['category_name' => 'Чорби и Супи'],
            ['category_name' => 'Raw храна'],
            ['category_name' => 'Домашни бургери и пици'],
            ['category_name' => 'Нискокалорична Храна'],
            ['category_name' => 'Мексиканска кујна'],
        ];

        Category::insert($categories);
    }
}
