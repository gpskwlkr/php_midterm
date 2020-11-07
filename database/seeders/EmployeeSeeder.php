<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => Str::random(20),
            'surname' => Str::random(50),
            'phone' => random_int(1111111111,9999999999),
            'position' => Str::random(50),
            'is_hired' => (bool)random_int(0,1)
        ]);
    }
}
