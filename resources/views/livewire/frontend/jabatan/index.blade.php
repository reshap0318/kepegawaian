<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Pegawai Jabatan </x-slot>
    <div class="grid grid-cols-3 pb-3">
        <h2 id="informasi Fungsional" class="text-lg leading-6 font-medium text-gray-900">Riwayat Jabatan</h2>
        <div class="text-right col-span-2 flex space-x-1 justify-end">
            <x-table.button color="indigo" href="{{ route('frontend.pegawaiJabatans.create') }}" class="px-3">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-table.button>
        </div>
    </div>
    @if (count($pegawaiJabatans) > 0)
    <div x-data="{show:false}">
        <x-table.init>
            <x-table.thead>
                <tr>
                    <x-table.th><span class="sr-only">status</span></x-table.th>
                    <x-table.th>Tanggal Mulai</x-table.th>
                    <x-table.th>Tanggal Selesai</x-table.th>
                    <x-table.th>Jabatan</x-table.th>
                    <x-table.th>Unit</x-table.th>
                    <x-table.th><span class="sr-only">Aksi</span></x-table.th>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($pegawaiJabatans as $pegawaiJabatan)
                    <x-table.tr>
                        <td class="pl-6 py-4" style="width: 3px">
                            @if ($pegawaiJabatan->status)
                                <span class="h-5 w-5 rounded-full bg-green-500 flex items-center justify-center ring-5 ring-white" >
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @else
                                <span class="h-5 w-5 rounded-full bg-gray-500 flex items-center justify-center ring-5 ring-white">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            @endif
                        </td>
                        <x-table.td>{{ $pegawaiJabatan->tgl_mulai }}</x-table.td>
                        <x-table.td>{{ $pegawaiJabatan->tgl_selesai }}</x-table.td>
                        <x-table.td>{{ $pegawaiJabatan->jabatan->nama }}</x-table.td>
                        <x-table.td>{{ $pegawaiJabatan->jabatan->unit->nama }}</x-table.td>
                        <x-table.td class="text-right text-sm font-medium">
                        <div class="flex space-x-1 justify-end">
                            <x-table.button color="indigo" href="{{ $pegawaiJabatan->file_sk_url }}" target="blank">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </x-table.button>
                            <x-table.button href="{{ route('frontend.pegawaiJabatans.edit',['pegawaiJabatan' => $pegawaiJabatan]) }}">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </x-table.button>
                            <x-table.button color="red" @click="show = true" wire:click="deleteModel({{ $pegawaiJabatan }})">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </x-table.button>
                        </div>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table.init>

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