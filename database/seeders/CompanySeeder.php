<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Company::insert([
            ['name' => 'PT. Maju Jaya'],
            ['name' => 'PT. Sukses Selalu'],
            ['name' => 'PT. Abadi Sentosa'],
        ]);
    }
}
