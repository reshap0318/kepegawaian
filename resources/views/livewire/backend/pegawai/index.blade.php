<div class="mt-4">
    <x-slot name="title"> Pegawai </x-slot>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Pegawai</h1>
        </div>
    </x-slot>
    <div class="grid grid-cols-3 pb-3">
        <x-form.find wire:model.debounce.500ms="search"></x-form.find>
        @can('pegawai_manage')
            <div class="text-right col-span-2">
                <x-table.button class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-1.5" color="indigo" href="{{ route('pegawai.create') }}">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Tambah
                </x-table.button>
            </div>
        @endcan
    </div>
    @if (count($pegawais) > 0)
        <div x-data="{show:false}">
            <x-table.init>
                <x-table.thead>
                    <tr>
                        <x-table.th>Nama</x-table.th>
                        <x-table.th>unit</x-table.th>
                        <x-table.th>Role</x-table.th>
                        <x-table.th><span class="sr-only">Aksi</span></x-table.th>
                    </tr>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($pegawais as $pegawai)
                        <x-table.tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                  <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ $pegawai->avatar_url }}" alt="">
                                  </div>
                                  <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                      {{ $pegawai->nama_lengkap }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                      {{ $pegawai->nip }}
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $pegawai->unit->nama }}</div>
                                <div class="text-sm text-gray-500">{{ $pegawai->lastJabatan()->first() ? $pegawai->lastJabatan()->first()->jabatan->nama : null }}</div>
                              </td>
                              <td class="px-6 py-4 text-sm text-gray-500">
                                <h5>
                                    @foreach ($pegawai->user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </h5>
                              </td>
                              <td class="px-6 py-4 text-right text-sm font-medium">
                                  <div class="flex space-x-1 justify-end">
                                    <x-table.button href="{{ route('pegawai.show',$pegawai) }}" class="normal-case" color="indigo">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </x-table.button>
                                    @can('pegawai_manage')
                                        <x-table.button class="normal-case" color="indigo" href="{{ route('pegawai.edit', [$pegawai]) }}">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </x-table.button>
                                        <x-table.button class="normal-case" color="red" @click="show = true" wire:click="deleteModel({{ $pegawai }})">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </x-table.button>
                                    @endcan
                                  </div>
                              </td>
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
    @can('pegawai_manage')
        <x-crud-simbol>
            <button type="button" class="px-3 py-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                </svg>
            </button>
            Detail
        </x-crud-simbol> 
    @endcan
</div>
