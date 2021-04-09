<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'id' => 1,
                'nama' => 'Universitas Andalas'
            ],
            [
                'id' => 2,
                'nama' => 'Fakultas Teknologi Informasi',
                'parent_unit_id' => 1
            ],
            [
                'id' => 3,
                'nama' => 'Fakultas Hukum',
                'parent_unit_id' => 1
            ],
            [
                'id' => 4,
                'nama' => 'Jurusan Sistem Informasi',
                'parent_unit_id' => 2
            ],
            [
                'id' => 5,
                'nama' => 'Jurusan Sistem Komputer',
                'parent_unit_id' => 2
            ],
            [
                'id' => 6,
                'nama' => 'Jurusan Hukum',
                'parent_unit_id' => 3
            ],
            [
                'id' => 7,
                'nama' => 'Program Studi Hukum Perdata',
                'parent_unit_id' => 6
            ],
            [
                'id' => 8,
                'nama' => 'Program Studi Hukum Perdana',
                'parent_unit_id' => 6
            ]
        ];

        foreach ($datas as $data) {
            Unit::Create($data);
        }
    }
}
