
<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Dashboard </x-slot>
    <x-slot name="header">
        <div class="inline-flex max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
        </div>
    </x-slot>

    <section aria-labelledby="informasi-akun">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-5 py-2 sm:px-2">
                    <marquee class="text-lg" style="font-family:Book Antiqua; font-size: 30px;
                    font-weight: 800;" loop="infinite" scrollamount="15" direction="right" >SELAMAT DATANG</marquee>
            </div>
        </div>
    </section>
    <br>

    <section aria-labelledby="informasi-akun">
        <div class="bg-white shadow sm:rounded-lg ">
            <div class="px-4 py-4">
                <img class="h-16 w-16 rounded-full object-contain h-24 w-full" src="{{ Auth()->user()->pegawai->avatar_url }}" alt="">
            </div>
            <div>
                <h1 class="text-center justify-between text-2xl font-bold text-gray-900">{{ Auth()->user()->pegawai->nama }}</h1>
                <p class="text-center justify-between text-sm font-medium text-gray-500">Sebagai {{ optional(Auth()->user()->roles()->first())->name ?? "Not Define" }} di {{ Auth()->user()->pegawai->unit->nama }}</p>
            <br>
            </div>
        </div>
        </div>
    </section>


    @php
        $class='mt-6 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-3';
        if(Auth::user()->hasRole(2))
        {
            $class='mt-6 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-2';
        }
    @endphp
  

    <ul class="{{$class}}">

            {{-- @can('units_manage')  
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashUnit::class)
            @endcan --}}
            
            @can('pegawai_access')
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegawai::class)
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashSatker::class)
            @endcan

            {{-- @can('apiAksess_manage')
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashApiAkses::class)
            @endcan --}}
        
            @can('jabatan-units_manage')    
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashJabatanUnit::class)
            @endcan

            @can('jabatan-units_manage') 
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashPangkatGolongan::class)
            @endcan

            @can('fungsionals_manage')  
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashFungsional::class)
            @endcan
                
            @can('roles_manage')
            {{-- @livewire(App\Http\Livewire\Frontend\Dashboard\DashPermission::class) --}}

            @livewire(App\Http\Livewire\Frontend\Dashboard\DashRole::class)
            @endcan

            {{-- @can('pegawai')
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegFungsional::class)
            @endcan

            @can('pegawai')
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegJabatanUnit::class)
            @endcan

            @can('pegawai')
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegPangkatGolongan::class)
            @endcan
 
            @can('pegawai')
            @livewire(App\Http\Livewire\Frontend\Dashboard\DashPegMutasi::class)
            @endcan --}}
    </ul>
    </div>
</div>