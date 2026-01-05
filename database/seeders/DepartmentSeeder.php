<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $departments = [
            ['Medicine', 'Medicine'],
            ['Surgery', 'Surgery'],
            ['Cardiology', 'Cardio'],
            ['Neurology', 'Neuro'],
            ['Nephrology', 'Nephro'],
            ['Gastroenterology', 'Gastro'],
            ['Endocrinology', 'Endocrine'],
            ['Pulmonology', 'Chest'],
            ['Dermatology', 'Derm'],
            ['Psychiatry', 'Psych'],
            ['Pediatrics', 'Pediatrics'],
            ['Neonatology', 'Neo'],
            ['Gynecology & Obstetrics', 'Gynae & Obs'],
            ['Orthopedics', 'Ortho'],
            ['ENT', 'ENT'],
            ['Ophthalmology', 'Eye'],
            ['Dentistry', 'Dental'],
            ['Oncology', 'Onco'],
            ['Radiology & Imaging', 'Radiology'],
            ['Pathology & Lab Medicine', 'Pathology'],
            ['Anesthesiology', 'Anesthesia'],
            ['Urology', 'Urology'],
            ['Neurosurgery', 'Neurosurg'],
            ['Plastic Surgery', 'Plastic'],
            ['Cardiothoracic Surgery', 'CT Surgery'],
            ['Physical Medicine & Rehabilitation', 'PMR'],
            ['Emergency & Casualty', 'Emergency'],
            ['ICU', 'ICU'],
            ['NICU', 'NICU'],
            ['CCU', 'CCU'],
            ['Dialysis Unit', 'Dialysis'],
            ['Physiotherapy', 'Physio'],
            ['Nutrition & Dietetics', 'Diet'],
            ['Blood Bank & Transfusion', 'Blood Bank'],
            ['Microbiology', 'Micro'],
            ['Public Health', 'Public Health'],
            ['Family Medicine', 'Family Med'],
            ['Internal Medicine', 'IM'],
            ['Forensic Medicine', 'Forensic'],
            ['Pain Management', 'Pain'],
        ];

        foreach ($departments as $d) {
            DB::table('departments')->insert([
                'department_name' => $d[0],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
