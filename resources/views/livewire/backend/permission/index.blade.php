<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Permissions </x-slot>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Permissions</h1>
        </div>
    </x-slot>
    <div class="grid grid-cols-3 pb-3">
        <div>
            <div class="relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="text" wire:model.debounce.500ms="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="search">
            </div>
        </div>
        <div class="text-right col-span-2">
            <x-form.button class="ml-3 normal-case" color="indigo" href="{{ route('permissions.create') }}">
                Tambah
            </x-form.button>
        </div>
    </div>
    @if (count($permissions) > 0)
        <x-table.init>
            <x-table.thead>
                <tr>
                    <x-table.th>Permissions</x-table.th>
                    <x-table.th>Aksi</x-table.th>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($permissions as $permission)
                    <x-table.tr>
                        <x-table.td>{{ $permission->name }}</x-table.td>
                        <x-table.td>
                            <x-form.button class="normal-case" px="3" py="1" color="indigo" href="{{ route('permissions.edit',$permission) }}">
                                Edit
                            </x-form.button>
                            <x-form.button class="normal-case" px="3" py="1" color="red">
                                Delete
                            </x-form.button>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table.init>
        <div class="my-2">
            {!! $permissions->links() !!}        
        </div>
    @else 
        <x-card>
            <div class="pt-2">Tidak Ada Data Ditemukan</div>
        </x-card> 
    @endif
        
</div>
