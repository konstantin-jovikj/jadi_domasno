<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin123#'),
            'role_id' => '1',
            'phone' => '123123',
            'address' => 'Street 123',
            'municipality_id' => '8',
            'profile_img_url' => 'https://png.pngtree.com/png-vector/20190629/ourmid/pngtree-office-work-user-icon-avatar-png-image_1527655.jpg',
            'is_active' => '1',
            'activation_code' => Str::random(20),


        ]);
    }
}
