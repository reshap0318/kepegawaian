<div class="">
    
    @can('units_manage')  
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashUnit::class)
    <br>
    @endcan
    
    @can('pegawai_manage')
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegawai::class)
    <br>
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashSatker::class)
    <br>
    @endcan

    @can('apiAksess_manage')
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashApiAkses::class)
    <br>
    @endcan
    @can('jabatan-units_manage')    
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashJabatanUnit::class)
    <br>
    @endcan
    @can('jabatan-units_manage') 
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashPangkatGolongan::class)
    <br>
    @endcan

    @can('fungsionals_manage')  
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashFungsional::class)
    <br>
    @endcan
        
    @can('roles_manage')
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashPermission::class)
    <br>
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashRole::class)
    <br>
    @endcan

    @can('pegawai-fungsional_access')
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegFungsional::class)
    <br>
    @endcan

    @can('pegawai-jabatan_access')
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegJabatanUnit::class)
    <br>
    @endcan

    @can('pegawai-pangkat_access')
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegPangkatGolongan::class)
    <br>
    @endcan
    
    @can('mutasi_access')
    @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegMutasi::class)
    @endcan
    
</div>