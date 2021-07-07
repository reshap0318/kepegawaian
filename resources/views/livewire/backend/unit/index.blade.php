<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Unit </x-slot>
    <x-slot name="header">
        <div class="inline-flex max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Unit</h1>
        </div>
    </x-slot>
    @can('units_manage')    
        @livewire(App\Http\Livewire\Backend\Unit\DataTable::class, [
            "createLink" => route('units.create'),
            "perPage" => 5
        ])
    @else
        @livewire(App\Http\Livewire\Backend\Unit\DataTable::class, [
            "createLink" => "",
            "perPage" => 5
        ])
    @endcan
    @can('units_manage')
        <x-crud-simbol/> 
    @endcan    
</div>
