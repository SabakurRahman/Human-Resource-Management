<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         Company::create([
                'name' => 'MicroDeft',
                'logo_path' => 'path/to/logo1.png',
                'ceo' => 'Saif Ahamed Turzo',
                'address' => 'House# 14 (3rd Floor),
                              Block# B, Road# Main Road, Rampur Banasree, Dhaka- 1219',
                'account' => '2271090001584',
                'status' => 1,
                'description' => 'Description of Company A',
            ]);




    }
}
