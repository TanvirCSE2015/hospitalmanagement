<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tests = [
            // Hematology
            ['Hemoglobin', '13–17', 'g/dL'],
            ['RBC Count', '4.5–5.9', 'million/µL'],
            ['WBC Count', '4.0–11.0', 'thousand/µL'],
            ['Platelet Count', '150–450', 'thousand/µL'],
            ['Hematocrit (PCV)', '40–52', '%'],
            ['MCV', '80–100', 'fL'],
            ['MCH', '27–33', 'pg'],
            ['MCHC', '32–36', 'g/dL'],
            ['ESR', '0–20', 'mm/hr'],
            ['Blood Group', null, null],

            // Diabetes
            ['Fasting Blood Sugar', '70–100', 'mg/dL'],
            ['Random Blood Sugar', '70–140', 'mg/dL'],
            ['Postprandial Blood Sugar', '140–180', 'mg/dL'],
            ['HbA1c', '4.0–5.6', '%'],
            ['Urine Sugar', 'Negative', null],

            // Renal Function
            ['Serum Creatinine', '0.6–1.3', 'mg/dL'],
            ['Blood Urea', '15–45', 'mg/dL'],
            ['Uric Acid', '3.5–7.2', 'mg/dL'],
            ['Serum Sodium', '135–145', 'mmol/L'],
            ['Serum Potassium', '3.5–5.1', 'mmol/L'],

            // Liver Function
            ['SGPT (ALT)', '7–56', 'U/L'],
            ['SGOT (AST)', '5–40', 'U/L'],
            ['Alkaline Phosphatase', '44–147', 'U/L'],
            ['Total Bilirubin', '0.3–1.2', 'mg/dL'],
            ['Direct Bilirubin', '0.0–0.3', 'mg/dL'],

            // Lipid Profile
            ['Total Cholesterol', '<200', 'mg/dL'],
            ['HDL Cholesterol', '>40', 'mg/dL'],
            ['LDL Cholesterol', '<130', 'mg/dL'],
            ['Triglycerides', '<150', 'mg/dL'],

            // Thyroid
            ['TSH', '0.4–4.0', 'µIU/mL'],
            ['T3', '80–200', 'ng/dL'],
            ['T4', '5.0–12.0', 'µg/dL'],

            // Others
            ['CRP', '<1.0', 'mg/L'],
            ['D-Dimer', '<0.5', 'µg/mL'],
            ['Troponin I', '<0.04', 'ng/mL'],
            ['Prothrombin Time', '11–13.5', 'sec'],
            ['INR', '0.8–1.1', null],
            ['Vitamin D', '20–50', 'ng/mL'],
            ['Vitamin B12', '200–900', 'pg/mL'],
            ['Ferritin', '24–336', 'ng/mL'],
            ['Serum Iron', '60–170', 'µg/dL'],
            ['PSA', '<4.0', 'ng/mL'],
            ['Calcium', '8.6–10.2', 'mg/dL'],
        ];

        foreach ($tests as $test) {
            DB::table('tests')->insert([
                'test_name'      => $test[0],
                'standard_value' => $test[1],
                'unit'           => $test[2],
                'description'    => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
