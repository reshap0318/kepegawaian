<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Permission </x-slot>
    <x-slot name="header">
        <div class="inline-flex max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Permission</h1>
        </div>
    </x-slot>
    @can('roles_manage')
        @livewire(App\Http\Livewire\Backend\Permission\DataTable::class, [
            "createLink" => route('roles.create'),
            "perPage" => 5
        ])
    @else
        @livewire(App\Http\Livewire\Backend\Permission\DataTable::class, [
            "createLink" => "",
            "perPage" => 5
        ])
    @endcan
    @can('roles_manage')
        <x-crud-simbol/> 
    @endcan 
</div>
