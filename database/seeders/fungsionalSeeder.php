<?php

namespace Database\Seeders;

use App\Models\Fungsional;
use Illuminate\Database\Seeder;

class fungsionalSeeder extends Seeder
{
    public function run()
    {
        $fungsionals = [
            ['nama' => 'Asisten Ahli', 'grade' => '150'],
            ['nama' => 'Lektor', 'grade' => '300'],
            ['nama' => 'Lektor Kepala', 'grade' => '700'],
            ['nama' => 'Profesor', 'grade' => '1050'],
        ];
        foreach ($fungsionals as $fungsional) {
            Fungsional::create($fungsional);
        }
    }
}
