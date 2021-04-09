<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Fungsional </x-slot>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Fungsional</h1>
        </div>
    </x-slot>
    <div class="grid grid-cols-3 pb-3">
        <x-form.find wire:model.debounce.500ms="search"></x-form.find>
        @can('fungsionals_manage')
            <div class="text-right col-span-2">
                <x-table.button class="inline-flex items-center text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-1.5" color="indigo" href="{{ route('fungsionals.create') }}">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Tambah
                </x-table.button>
            </div>
        @endcan
    </div>
    @if (count($fungsionals) > 0)
    <div x-data="{show:false}">
        <x-table.init>
            <x-table.thead>
                <tr>
                    <x-table.th>Nama</x-table.th>
                    <x-table.th>Tingkat</x-table.th>
                    <x-table.th><span class="sr-only">Aksi</span></x-table.th>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($fungsionals as $fungsional)
                    <x-table.tr>
                        <x-table.td>{{ $fungsional->nama }}</x-table.td>
                        <x-table.td>{{ $fungsional->grade }}</x-table.td>
                        <x-table.td class="text-right">
                            @can('fungsionals_manage')
                            <div class="flex space-x-1 justify-end">
                                <x-table.button class="normal-case" color="indigo" href="{{ route('fungsionals.edit',$fungsional) }}">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </x-table.button>
                                <x-table.button class="normal-case" color="red" @click="show = true" wire:click="deleteModel({{ $fungsional }})">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </x-table.button>
                            </div>
                            @endcan
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table.init>
        <div class="my-2">
            {!! $fungsionals->links() !!}        
        </div>
        <x-model x-show="show" style="display: none">
            <x-slot name="title"> Delete </x-slot>
            <x-slot name="attrmodal">@click.away="show = false" @close.stop="show = false" </x-slot>
            <x-slot name="attrclose"> @click="show = false" </x-slot>
            <x-slot name="btn">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="show = false" wire:click="destroy()">
                    Delete
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" @click="show = false">
                    Cancel
                </button>
            </x-slot>
            Yakin Menghapus Ini?
        </x-model>

    </div>
    @else
        <x-card><div class="pt-2">Tidak Ada Data Ditemukan</div></x-card>
    @endif
    @can('fungsionals_manage')
        <x-crud-simbol/> 
    @endcan
</div>
