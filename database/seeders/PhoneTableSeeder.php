<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($i=0; $i < 10; $i++) { 
            DB::table('phones')->insert([
                'phone'          => rand(10, 100),
            ]);
        }
    }
}
