<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Api Akses </x-slot>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Api Akses</h1>
        </div>
    </x-slot>
    @can('apiAksess_manage')
        @livewire(App\Http\Livewire\Backend\ApiAkses\DataTable::class, [
            "createLink" => route('apiAksess.create'),
            "perPage" => 25
        ])
     <x-crud-simbol/> 
    @else
        @livewire(App\Http\Livewire\Backend\ApiAkses\DataTable::class, [
            "createLink" => "",
            "perPage" => 25
        ])
    @endcan
</div>
