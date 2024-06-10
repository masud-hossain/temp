<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Company Name',
            'propiter' => 'Mr Agarwal',
            'address' => 'Natore Sadar Natore',
            'phone' => '01712635712',
            'description' => 'Mill Discriptions',
        ];

        Info::create($data);
    }
}
