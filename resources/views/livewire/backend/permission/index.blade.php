<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Permission </x-slot>
    <x-slot name="header">
        <div class="inline-flex max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Permission</h1>
            <div class="ml-2">
                @can('roles_manage')
                    <x-table.button class="inline-flex items-center text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-1.5" color="indigo"  href="{{ route('permissions.create') }}">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Tambah
                    </x-table.button>
                @endcan
            </div>
        </div>
    </x-slot>
    @livewire(App\Http\Livewire\Backend\Permission\DataTable::class, [
        "exportable" => true, 
        "hideable" => "select",
        "perPage" => 5
    ])
    @can('roles_manage')
        <x-crud-simbol/> 
    @endcan 
</div>
