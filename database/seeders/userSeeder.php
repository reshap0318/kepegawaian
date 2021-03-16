<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class userSeeder extends Seeder
{
    public function run()
    {

        $permissions = [
            'roles_access', 'roles_manage', 'roles',
            'units_access', 'units_manage', 'units',
            'fungsionals_access', 'fungsionals_manage', 'fungsionals',
            'pangkat-golongans_access', 'pangkat-golongans_manage', 'pangkat-golongans',
            'jabatan-units_access', 'jabatan-units_manage', 'jabatan-units',
            'pegawai_access', 'pegawai_manage', 'pegawai',
            'pegawai-fungsional_access', 'pegawai-fungsional_manage', 'pegawai-fungsional',
            'pegawai-pangkat_access', 'pegawai-pangkat_manage', 'pegawai-pangkat',
            'pegawai-jabatan_access', 'pegawai-jabatan_manage', 'pegawai-jabatan',
            'mutasi_access', 'mutasi_manage', 'mutasi',
        ];

        $permissionAdmin = $permissions;
        $permissionAdminBidang = [
            'pegawai_access', 'pegawai_manage', 'pegawai',
            'pegawai-fungsional_access', 'pegawai-fungsional_manage', 'pegawai-fungsional',
            'pegawai-pangkat_access', 'pegawai-pangkat_manage', 'pegawai-pangkat',
            'pegawai-jabatan_access', 'pegawai-jabatan_manage', 'pegawai-jabatan',
            'mutasi_access', 'mutasi_manage', 'mutasi',
        ];

        Unit::Create([
            'nama' => 'Univeristas Andalas'
        ]);
        
        Unit::Create([
            'nama' => 'Fakultas Teknologi Informasi'
        ]);
        

        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }

        $admin = Role::create(['name'=>'admin']);
        $admin->givePermissionTo($permissionAdmin);
        $adminBidang = Role::create(['name'=>'admin bidang']);
        $adminBidang->givePermissionTo($permissionAdminBidang);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
        Pegawai::create([
            'id' => $user->id,
            'unit_id' => 1,
            'nip' => '1234567890',
            'jenis_kelamin' => 1,
            'tempat_lahir' => 'Padang',
            'tgl_lahir' => now()
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'admin2',
            'email' => 'admin2@asraf.com',
            'password' => bcrypt('admin2')
        ]);
        Pegawai::create([
            'id' => $user->id,
            'unit_id' => 2,
            'nip' => '1222121213131',
            'jenis_kelamin' => 1,
            'tempat_lahir' => 'Padang',
            'tgl_lahir' => now()
        ]);
        $user->assignRole('admin bidang');
    }
}
