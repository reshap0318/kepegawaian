<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Fungsional </x-slot>
    <x-slot name="header">
        <div class="inline-flex max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Fungsional</h1>
        </div>
    </x-slot>
    @can('fungsionals_manage')  
        @livewire(App\Http\Livewire\Backend\Fungsional\DataTable::class, [
            "createLink" => route('fungsionals.create'),
            "perPage" => 25
        ])
    @else
        @livewire(App\Http\Livewire\Backend\Fungsional\DataTable::class, [
            "createLink" => "",
            "perPage" => 25
        ])
    @endcan
    @can('fungsionals_manage')
        <x-crud-simbol/> 
    @endcan    
</div>
