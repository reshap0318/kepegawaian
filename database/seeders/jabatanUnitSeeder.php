<?php

namespace Database\Seeders;

use App\Models\JabatanUnit;
use Illuminate\Database\Seeder;

class jabatanUnitSeeder extends Seeder
{

    public function run()
    {
        $jabatanUnits = [
            [
                'nama' => 'Rektor', 
                'grade' => '150', 
                'corporate_grade' => '10', 
                'unit_id'=>1
            ],
            [
                'nama' => 'Dekan', 
                'grade' => '100', 
                'corporate_grade' => '7', 
                'unit_id'=>2
            ],
            [
                'nama' => 'Wakil Dekan', 
                'grade' => '70', 
                'corporate_grade' => '7', 
                'unit_id'=>2
            ],
        ];
        foreach ($jabatanUnits as $jabatanUnit) {
            JabatanUnit::create($jabatanUnit);
        }
    }
}
