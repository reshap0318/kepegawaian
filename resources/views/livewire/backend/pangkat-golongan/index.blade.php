<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Pangkat Golongan </x-slot>
    <x-slot name="header">
        <div class="inline-flex max-w-7xl mx-auto pt-2 px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Pangkat Golongan</h1>
        </div>
    </x-slot>
    @can('jabatan-units_manage')    
        @livewire(App\Http\Livewire\Backend\PangkatGolongan\DataTable::class, [
            "createLink" => route('pangkatGolongans.create'),
            "perPage" => 5
        ])
    @else
        @livewire(App\Http\Livewire\Backend\PangkatGolongan\DataTable::class, [
            "createLink" => "",
            "perPage" => 5
        ])
    @endcan
    @can('pangkat-golongans_manage') 
        <x-crud-simbol/>
    @endcan

</div>
