<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\{Role,Permission};

class RolePermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            'roles_access', 'roles_manage',
            'units_access', 'units_manage',
            'api-akses_access', 'api-akses_manage',
            'fungsionals_access', 'fungsionals_manage',
            'pangkat-golongans_access', 'pangkat-golongans_manage',
            'jabatan-units_access', 'jabatan-units_manage',
            'pegawai_access', 'pegawai_manage', 'pegawai_list',
            'pegawai-fungsional_access', 'pegawai-fungsional_manage',
            'pegawai-pangkat_access', 'pegawai-pangkat_manage',
            'pegawai-jabatan_access', 'pegawai-jabatan_manage',
            'mutasi_access', 'mutasi_manage','pegawai'
        ];

        $permissionAdmin = $permissions;
        $permissionAdminBidang = [
            'pegawai_access', 'pegawai_manage',
            'pegawai-fungsional_access', 'pegawai-fungsional_manage',
            'pegawai-pangkat_access', 'pegawai-pangkat_manage',
            'pegawai-jabatan_access', 'pegawai-jabatan_manage',
            'mutasi_access', 'mutasi_manage', 'pegawai'
        ];

        $permissionPegawai = [ 'pegawai' ];

        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }

        $admin = Role::create(['name'=>'admin']);
        $admin->givePermissionTo($permissionAdmin);

        $adminBidang = Role::create(['name'=>'admin unit']);
        $adminBidang->givePermissionTo($permissionAdminBidang);
        
        $adminBidang = Role::create(['name'=>'pegawai']);
        $adminBidang->givePermissionTo($permissionPegawai);
    }
}
