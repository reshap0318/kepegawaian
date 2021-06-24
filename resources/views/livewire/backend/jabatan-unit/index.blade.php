<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Jabatan Unit </x-slot>
    <x-slot name="header">
        <div class="inline-flex max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Jabatan Unit</h1>
            @can('jabatan-units_manage')    
                <div class="ml-2">
                    <x-table.button class="inline-flex items-center px-4 py-1.5 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-1.5" color="indigo" href="{{ route('jabatanUnits.create') }}">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Tambah
                    </x-table.button>
                </div>
            @endcan
        </div>
    </x-slot>
    @livewire(App\Http\Livewire\Backend\JabatanUnit\DataTable::class, [
        "exportable" => true, 
        "hideable" => "select",
        "perPage" => 5
    ])
    @can('jabatan-units_manage')
        <x-crud-simbol/> 
    @endcan    
</div>
