<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doses = [
            ['name' => '1st dose'],
            ['name' => '2nd dose'],
            ['name' => '3rd dose'],
            ['name' => '4th dose'],
            ['name' => '5th dose'],
            ['name' => 'Tdap'],
            ['name' => 'see footnote 5'],
            ['name' => '2 dose-series'],
            ['name' => '3 dose-series'],
            ['name' => 'booster'],
            ['name' => 'Annual vaccination (IIV only) 1 or 2 dose'],
            ['name' => 'Annual vaccination (LAIV or IIV) 1 or 2 dose'],
            ['name' => 'Annual vaccination (IIV only) 1 dose only'],
            ['name' => '3rd or 4th dose']
        ];

        DB::table('doses')->insert($doses);
    }
}
