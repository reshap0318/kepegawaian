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
                'id' => 1,
                'nama' => 'Rektor', 
                'grade' => '150', 
                'corporate_grade' => '10', 
                'unit_id'=>1,
            ],
            [
                'id' => 2,
                'nama' => 'Dekan', 
                'grade' => '100', 
                'corporate_grade' => '7', 
                'unit_id'=>2,
                'parent_jabatan_unit_id' => 1,
            ],
            [
                'id' => 3,
                'nama' => 'Wakil Dekan', 
                'grade' => '70', 
                'corporate_grade' => '7', 
                'unit_id'=>2,
                'parent_jabatan_unit_id' => 2,
            ],
        ];
        foreach ($jabatanUnits as $jabatanUnit) {
            JabatanUnit::create($jabatanUnit);
        }
    }
}
