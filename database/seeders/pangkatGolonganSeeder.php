<?php

namespace Database\Seeders;

use App\Models\PangkatGolongan;
use Illuminate\Database\Seeder;

class pangkatGolonganSeeder extends Seeder
{

    public function run()
    {
        $pangkatGols = [
            ['nama' => 'Penata Muda Tingkat I', 'golongan'=>'III/b'],
            ['nama' => 'Penata', 'golongan' => 'III/c'],
            ['nama' => 'Penata Tingkat I', 'golongan' => 'III/d'],
            ['nama' => 'Pembina', 'golongan' => 'Iv/a'],
            ['nama' => 'Pembina Tingkat I', 'golongan' => 'Iv/b'],
            ['nama' => 'Pembina Utama Muda', 'golongan' => 'Iv/c'],
            ['nama' => 'Pembina Utama Madya', 'golongan' => 'Iv/d'],
            ['nama' => 'Pembina Utama', 'golongan' => 'Iv/e'],
        ];
        foreach ($pangkatGols as $pangkatGol) {
            PangkatGolongan::create($pangkatGol);
        }
    }
}
