<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccines = [
            ['name' => 'Hepatitis B1 (HepB)'],
            ['name' => 'Rotavirus 2 (RV) (2-dose series) RV5 (3-dose series)'],
            ['name' => 'Diphtheria, tetanus, & acellular pertussis 3 (CTap: <7 yrs)'],
            ['name' => 'Tetanus, diphtheria, & acellular pertussis 4 (Tdap: >7 yrs)'],
            ['name' => 'Haemophilus influenzae type b5 (Hib)'],
            ['name' => 'Pneumococcal conjugate6 (PCV13)'],
            ['name' => 'Pneumococcal polysaccharide6 (PPSV23)'],
            ['name' => 'Inactivated poliovirus7 (IPV: <18 yrs)'],
            ['name' => 'Influenza8 (IIV; LAIV) 2 doses for some'],
            ['name' => 'Measles, mumps, rubella9 (MMR)'],
            ['name' => 'Varicella10 (VAR)'],
            ['name' => 'Hepatitis A11 (HepA)'],
            ['name' => 'Human papillomavirus12 (HPV2: females only; HPV4: males and females)'],
            ['name' => 'Meningococcal13 (Hib-MenCY > 6 weeks; MenACWY-D >9 mos; MenACWY-CRM ? 2 mos)']
        ];

        DB::table('vaccines')->insert($vaccines);
    }
}
