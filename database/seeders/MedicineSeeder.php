<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = [
            // Tablets
            ['Napa','Paracetamol','Tablet','mg','500','Beximco'],
            ['Ace','Paracetamol','Tablet','mg','500','Square'],
            ['Azyth','Azithromycin','Tablet','mg','500','Square'],
            ['Monas','Montelukast','Tablet','mg','10','ACME'],
            ['Histacin','Cetirizine','Tablet','mg','10','ACI'],
            ['Fexo','Fexofenadine','Tablet','mg','120','Incepta'],
            ['Rupa','Ranitidine','Tablet','mg','150','Opsonin'],
            ['Nidazole','Metronidazole','Tablet','mg','400','Renata'],
            ['Zimax','Azithromycin','Tablet','mg','250','Beximco'],
            ['Ketorol','Ketorolac','Tablet','mg','10','Square'],

            // Capsules
            ['Seclo','Omeprazole','Capsule','mg','20','Square'],
            ['Losectil','Omeprazole','Capsule','mg','20','Beximco'],
            ['Nexum','Esomeprazole','Capsule','mg','20','Incepta'],
            ['Amoxil','Amoxicillin','Capsule','mg','500','GSK'],
            ['Cef-3','Cefixime','Capsule','mg','400','Square'],
            ['E-Cap','Vitamin E','Capsule','IU','200','Drug Intl'],
            ['Riboson','Riboflavin','Capsule','mg','10','Opsonin'],
            ['Doxicap','Doxycycline','Capsule','mg','100','Renata'],
            ['Flugal','Fluconazole','Capsule','mg','150','Square'],
            ['Zincap','Zinc','Capsule','mg','20','Incepta'],

            // Syrups
            ['Napa Syrup','Paracetamol','Syrup','ml','120mg/5ml','Beximco'],
            ['Ceevit','Vitamin C','Syrup','ml','100mg/5ml','Square'],
            ['Tusca','Cough Syrup','Syrup','ml',null,'ACI'],
            ['Broze','Bromhexine','Syrup','ml','4mg/5ml','Incepta'],
            ['Salbutamol','Salbutamol','Syrup','ml','2mg/5ml','Opsonin'],
            ['Zinc Syrup','Zinc','Syrup','ml','10mg/5ml','ACME'],
            ['Gaviscon','Antacid','Syrup','ml',null,'Reckitt'],
            ['Lactulose','Lactulose','Syrup','ml','3.35g/5ml','Square'],
            ['Domper','Domperidone','Syrup','ml','5mg/5ml','Renata'],
            ['Ambrox','Ambroxol','Syrup','ml','15mg/5ml','Beximco'],

            // Injections
            ['Ceftriaxone','Ceftriaxone','Injection','g','1','Renata'],
            ['Meropenem','Meropenem','Injection','g','1','ACI'],
            ['Gentamycin','Gentamicin','Injection','mg','80','Square'],
            ['Insulin R','Human Insulin','Injection','IU','100','Novo'],
            ['Insulin N','Human Insulin','Injection','IU','100','Novo'],
            ['Heparin','Heparin','Injection','IU','5000','ACME'],
            ['Diclofenac','Diclofenac','Injection','mg','75','Opsonin'],
            ['Ketorolac','Ketorolac','Injection','mg','30','Incepta'],
            ['Ondansetron','Ondansetron','Injection','mg','4','Square'],
            ['Adrenaline','Epinephrine','Injection','mg','1','Renata'],

            // Drops
            ['Napa Drop','Paracetamol','Drop','ml','80mg/ml','Beximco'],
            ['Tobradex','Tobramycin','Eye Drop','ml',null,'Alcon'],
            ['Moxiflox','Moxifloxacin','Eye Drop','ml',null,'Sun'],
            ['Xylomet','Xylometazoline','Nasal Drop','ml','0.1%','ACI'],
            ['Otozol','Chloramphenicol','Ear Drop','ml',null,'Square'],
            ['Refresh','Artificial Tears','Eye Drop','ml',null,'Allergan'],
            ['Naphcon','Naphazoline','Eye Drop','ml',null,'Bausch'],
            ['Otrivin','Xylometazoline','Nasal Drop','ml','0.05%','GSK'],
            ['Dexacort','Dexamethasone','Eye Drop','ml',null,'Renata'],
            ['Ear Calm','Acetic Acid','Ear Drop','ml',null,'Incepta'],

            // Cream / Ointment
            ['Betnovate','Betamethasone','Cream','g','0.1%','GSK'],
            ['Fucidin','Fusidic Acid','Ointment','g','2%','LEO'],
            ['Clotrimazole','Clotrimazole','Cream','g','1%','Square'],
            ['Miconazole','Miconazole','Cream','g','2%','Renata'],
            ['Hydrocortisone','Hydrocortisone','Cream','g','1%','ACI'],
            ['Nebanol','Antibiotic','Ointment','g',null,'ACI'],
            ['Permethrin','Permethrin','Cream','g','5%','Incepta'],
            ['Bactroban','Mupirocin','Ointment','g','2%','GSK'],
            ['Tacrolimus','Tacrolimus','Ointment','g','0.03%','Sun'],
            ['Zinc Oxide','Zinc Oxide','Cream','g','20%','Square'],

            // Inhaler / Nebulizer
            ['Ventolin','Salbutamol','Inhaler','puff','100mcg','GSK'],
            ['Seretide','Fluticasone','Inhaler','puff',null,'GSK'],
            ['Duolin','Ipratropium','Nebulizer','ml',null,'Cipla'],
            ['Budecort','Budesonide','Nebulizer','ml',null,'Sun'],
            ['Combivent','Ipratropium','Inhaler','puff',null,'Boehringer'],

            // IV Fluid / Powder
            ['Normal Saline','Sodium Chloride','IV Fluid','ml','0.9%','Opsonin'],
            ['DNS','Dextrose Saline','IV Fluid','ml',null,'ACI'],
            ['RL','Ringer Lactate','IV Fluid','ml',null,'Beximco'],
            ['ORS','Oral Rehydration Salts','Powder','sachet',null,'ACME'],
            ['Isabgol','Psyllium Husk','Powder','g',null,'Square'],
        ];

        foreach ($medicines as $m) {
            DB::table('medicines')->insert([
                'name' => $m[0],
                'generic_name' => $m[1],
                'type' => $m[2],
                'unit' => $m[3],
                'strength' => $m[4],
                'manufacturer' => $m[5],
                'note' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
