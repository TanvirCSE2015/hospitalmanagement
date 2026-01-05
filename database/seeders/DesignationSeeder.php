<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $designations = [
            ['Professor', 'Prof.'],
            ['Associate Professor', 'Assoc. Prof.'],
            ['Assistant Professor', 'Asst. Prof.'],
            ['Senior Consultant', 'Sr. Consultant'],
            ['Consultant', 'Consultant'],
            ['Junior Consultant', 'Jr. Consultant'],
            ['Registrar', 'Registrar'],
            ['Senior Registrar', 'Sr. Registrar'],
            ['Assistant Registrar', 'Asst. Registrar'],
            ['Resident Medical Officer', 'RMO'],
            ['Medical Officer', 'MO'],
            ['Senior Medical Officer', 'SMO'],
            ['Junior Medical Officer', 'JMO'],
            ['Intern Doctor', 'Intern'],
            ['House Officer', 'HO'],
            ['Specialist', 'Specialist'],
            ['Senior Specialist', 'Sr. Specialist'],
            ['Junior Specialist', 'Jr. Specialist'],
            ['Surgeon', 'Surgeon'],
            ['Consultant Surgeon', 'Cons. Surgeon'],
            ['Anesthesiologist', 'Anesth.'],
            ['Pediatrician', 'Pediatrician'],
            ['Gynecologist', 'Gynecologist'],
            ['Orthopedic Surgeon', 'Ortho'],
            ['Cardiologist', 'Cardio'],
            ['Neurologist', 'Neuro'],
            ['Dermatologist', 'Derma'],
            ['Psychiatrist', 'Psych'],
            ['Radiologist', 'Radiology'],
            ['Pathologist', 'Pathology'],
        ];

        foreach ($designations as $d) {
            DB::table('designations')->insert([
                'designation_name' => $d[0],
                'short_name' => $d[1],
                'note' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
