<div class="mt-4">
    <x-slot name="title"> Pegawai </x-slot>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Pegawai</h1>
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
            <x-form.button class="ml-3 normal-case" color="indigo" href="{{ route('pegawai.create') }}">
                Tambah
            </x-form.button>
        </div>
    </div>
    @if (count($pegawais) > 0)
        <div x-data="{show:false}">
            <x-table.init>
                <x-table.thead>
                    <tr>
                        <x-table.th>Nip</x-table.th>
                        <x-table.th>Nama</x-table.th>
                        <x-table.th>Unit</x-table.th>
                        <x-table.th>Aksi</x-table.th>
                    </tr>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($pegawais as $pegawai)
                        <x-table.tr>
                            <x-table.td>{{ $pegawai->nip }}</x-table.td>
                            <x-table.td>{{ $pegawai->nama }}</x-table.td>
                            <x-table.td>{{ $pegawai->unit->nama }}</x-table.td>
                            <x-table.td>
                                <x-form.button class="normal-case" px="3" py="1" color="indigo" href="{{ route('pegawai.show',$pegawai) }}">
                                    <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </x-form.button>
                                <x-form.button class="normal-case" px="3" py="1" color="indigo" href="{{ route('pegawai.edit',$pegawai) }}">
                                    <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </x-form.button>
                                <x-form.button class="normal-case" px="3" py="1" color="red" @click="show = true" wire:click="deleteModel({{ $pegawai }})">
                                    <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </x-form.button>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.init>
            <div class="my-2">
                {!! $pegawais->links() !!}        
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
</div>
