<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Sazid Hasan',
            'job_title' => 'Front-End Developer',
            'joining_date' => now(),
            'salary' => 30000.00,
            'email' => 'sazid@hasan.com',
            'mobile_no' => '01996687218',
            'address' => '10 Mile',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
