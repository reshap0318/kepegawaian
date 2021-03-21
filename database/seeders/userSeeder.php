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
            'roles_access', 'roles_manage',
            'units_access', 'units_manage',
            'fungsionals_access', 'fungsionals_manage',
            'pangkat-golongans_access', 'pangkat-golongans_manage',
            'jabatan-units_access', 'jabatan-units_manage',
            'pegawai_access', 'pegawai_manage', 'pegawai_list',
            'pegawai-fungsional_access', 'pegawai-fungsional_manage',
            'pegawai-pangkat_access', 'pegawai-pangkat_manage',
            'pegawai-jabatan_access', 'pegawai-jabatan_manage',
            'mutasi_access', 'mutasi_manage',
        ];

        $permissionAdmin = $permissions;
        $permissionAdminBidang = [
            'pegawai_access', 'pegawai_manage',
            'pegawai-fungsional_access', 'pegawai-fungsional_manage',
            'pegawai-pangkat_access', 'pegawai-pangkat_manage',
            'pegawai-jabatan_access', 'pegawai-jabatan_manage',
            'mutasi_access', 'mutasi_manage',
        ];

        Unit::Create([
            'nama' => 'Univeristas Andalas'
        ]);
        
        Unit::Create([
            'nama' => 'Fakultas Teknologi Informasi',
            'parent_unit_id' => 1
        ]);
        

        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }

        $admin = Role::create(['name'=>'admin']);
        $admin->givePermissionTo($permissionAdmin);
        $adminBidang = Role::create(['name'=>'admin bidang']);
        $adminBidang->givePermissionTo($permissionAdminBidang);

        $user = User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
        Pegawai::create([
            'id' => $user->id,
            'nama' => 'Admin',
            'unit_id' => 1,
            'nip' => '1234567890',
            'jenis_kelamin' => 1,
            'tempat_lahir' => 'Padang',
            'tgl_lahir' => now()
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'email' => 'admin2@admin2.com',
            'password' => bcrypt('admin2')
        ]);
        Pegawai::create([
            'id' => $user->id,
            'nama' => 'Admin2',
            'unit_id' => 2,
            'nip' => '1222121213131',
            'jenis_kelamin' => 1,
            'tempat_lahir' => 'Jambi',
            'tgl_lahir' => now()
        ]);
        $user->assignRole('admin bidang');
    }
}
