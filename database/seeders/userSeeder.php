<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            //su-admin
            [
                'email' => 'admin@admin.com',
                'password' => 'root',
                'nama' => 'Admin',
                'unit_id' => 1,
                'nip' => '1611522012',
                'jenis_kelamin' => 1,
                'tempat_lahir' => 'Padang',
                'role' => 'admin'
            ],
            //admin FTI
            [
                'email' => 'fti@admin.com',
                'password' => 'root',
                'nama' => 'Admin FTI',
                'unit_id' => 2,
                'nip' => '1611523012',
                'jenis_kelamin' => 1,
                'tempat_lahir' => 'Jambi',
                'role' => 'admin unit'
            ],
            //pegawai FTI
            [
                'email' => 'fti@pegawai.com',
                'password' => 'root',
                'nama' => 'Pegawai FTI',
                'unit_id' => 2,
                'nip' => '1611521006',
                'jenis_kelamin' => 0,
                'tempat_lahir' => 'Piladang',
                'role' => 'pegawai'
            ],
            //admin SI
            [
                'email' => 'si@admin.com',
                'password' => 'root',
                'nama' => 'Admin SI',
                'unit_id' => 4,
                'nip' => '1611521001',
                'jenis_kelamin' => 1,
                'tempat_lahir' => 'Padang',
                'role' => 'admin unit'
            ],
            //pegawai SI
            [
                'email' => 'si@pegawai.com',
                'password' => 'root',
                'nama' => 'Pegawai SI',
                'unit_id' => 4,
                'nip' => '1611521002',
                'jenis_kelamin' => 0,
                'tempat_lahir' => 'Padang',
                'role' => 'pegawai'
            ],
            //admin SK
            [
                'email' => 'sk@admin.com',
                'password' => 'root',
                'nama' => 'Admin SK',
                'unit_id' => 5,
                'nip' => '1611521003',
                'jenis_kelamin' => 0,
                'tempat_lahir' => 'Padang',
                'role' => 'admin unit'
            ],
            //pegawai SK
            [
                'email' => 'sk@pegawai.com',
                'password' => 'root',
                'nama' => 'Pegawai SK',
                'unit_id' => 5,
                'nip' => '1611521004',
                'jenis_kelamin' => 1,
                'tempat_lahir' => 'Padang',
                'role' => 'pegawai'
            ],
            //admin Hukum
            [
                'email' => 'hukum@admin.com',
                'password' => 'root',
                'nama' => 'Admin Hukum',
                'unit_id' => 3,
                'nip' => '1611521005',
                'jenis_kelamin' => 1,
                'tempat_lahir' => 'Padang',
                'role' => 'admin unit'
            ],
            //pegawai Hukum
            [
                'email' => 'hukum@pegawai.com',
                'password' => 'root',
                'nama' => 'Pegawai Hukum',
                'unit_id' => 3,
                'nip' => '1611522006',
                'jenis_kelamin' => 1,
                'tempat_lahir' => 'Padang',
                'role' => 'pegawai'
            ],
            //admin Hukum Perdata
            [
                'email' => 'hukumperdata@admin.com',
                'password' => 'root',
                'nama' => 'Admin Hukum Perdata',
                'unit_id' => 6,
                'nip' => '1611521007',
                'jenis_kelamin' => 0,
                'tempat_lahir' => 'Padang',
                'role' => 'admin unit'
            ],
            //pegawai Hukum Perdata
            [
                'email' => 'hukumperdata@pegawai.com',
                'password' => 'root',
                'nama' => 'Pegawai Hukum Perdata',
                'unit_id' => 6,
                'nip' => '1611521008',
                'jenis_kelamin' => 0,
                'tempat_lahir' => 'Padang',
                'role' => 'pegawai'
            ],
            //admin Hukum Perdana
            [
                'email' => 'hukumperdana@admin.com',
                'password' => 'root',
                'nama' => 'Admin Hukum Perdana',
                'unit_id' => 7,
                'nip' => '1611521009',
                'jenis_kelamin' => 0,
                'tempat_lahir' => 'Padang',
                'role' => 'admin unit'
            ],
            //pegawai Hukum Perdana
            [
                'email' => 'hukumperdana@pegawai.com',
                'password' => 'root',
                'nama' => 'Pegawai Hukum Perdana',
                'unit_id' => 7,
                'nip' => '1611521010',
                'jenis_kelamin' => 0,
                'tempat_lahir' => 'Padang',
                'role' => 'pegawai'
            ]
        ];

        foreach ($datas as $data) {
            $user = User::create([
                'email' => $data['email'],
                'username' => $data['nip'],
                'password' => bcrypt($data['password']),
                'email_verified_at' => now()
            ]);
            Pegawai::create([
                'id' => $user->id,
                'nama' => $data['nama'],
                'unit_id' => $data['unit_id'],
                'nip' => $data['nip'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tgl_lahir' => now()
            ]);
            $user->assignRole($data['role']);
        }
    }
}
