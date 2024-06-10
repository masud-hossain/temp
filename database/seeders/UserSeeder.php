<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Masud',
            'email' => 'masud@gmail.com',
            'phone' => '01712635712',
            'password' => Hash::make('123456')
        ];

        User::create($data);
    }
}
