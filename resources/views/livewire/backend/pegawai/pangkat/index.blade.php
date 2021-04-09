<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Pegawai Pangkat </x-slot>
    <div class="grid grid-cols-3 pb-3">
        <h2 id="informasi Fungsional" class="text-lg leading-6 font-medium text-gray-900">Riwayat Pangkat</h2>
        <div class="text-right col-span-2 flex space-x-1 justify-end">
            @can('pegawai-pangkat_manage')
            <x-table.button color="indigo" href="{{ route('pegawaiPangkats.create', $user) }}" class="px-3">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-table.button>
            @endcan
        </div>
    </div>
    @if (count($pegawaiPangkats) > 0)
    <div x-data="{show:false, showConfirm:false}">
        <x-table.init>
            <x-table.thead>
                <tr>
                    <x-table.th><span class="sr-only">status</span></x-table.th>
                    <x-table.th>Tanggal</x-table.th>
                    <x-table.th>Pangkat</x-table.th>
                    <x-table.th><span class="sr-only">Aksi</span></x-table.th>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($pegawaiPangkats as $pegawaiPangkat)
                    <x-table.tr>
                        <td class="pl-6 py-4" style="width: 3px">
                            @if ($pegawaiPangkat->status)
                                <span class="h-5 w-5 rounded-full bg-green-500 flex items-center justify-center ring-5 ring-white">
                                    <svg class="h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @else
                                <span class="h-5 w-5 rounded-full bg-gray-500 flex items-center justify-center ring-5 ring-white">
                                    <svg class="h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            @endif
                        </td>
                        <x-table.td>{{ $pegawaiPangkat->tmt }}</x-table.td>
                        <x-table.td>{{ $pegawaiPangkat->pangkatGolongan->nama }}</x-table.td>
                        <x-table.td> 
                            <div class="flex space-x-1 justify-end">
                                <x-table.button class="normal-case" color="indigo" href="{{ $pegawaiPangkat->file_sk_url }}" target="blank">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </x-table.button>
                                @can('pegawai-pangkat_manage')
                                    <x-table.button color="indigo" @click="showConfirm = true" wire:click="changeStatusModel({{ $pegawaiPangkat }})">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </x-table.button>    
                                    <x-table.button class="normal-case" color="indigo" href="{{ route('pegawaiPangkats.edit',['user'=>$user, 'pegawaiPangkat' => $pegawaiPangkat]) }}">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </x-table.button>
                                    <x-table.button class="normal-case" color="red" @click="show = true" wire:click="deleteModel({{ $pegawaiPangkat }})">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </x-table.button>
                                @endcan
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
        <x-model x-show="showConfirm" style="display: none">
            <x-slot name="title"> Konfirmasi </x-slot>
            <x-slot name="attrmodal">@click.away="showConfirm = false" @close.stop="showConfirm = false" </x-slot>
            <x-slot name="attrclose"> @click="showConfirm = false" </x-slot>
            <x-slot name="btn">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="showConfirm = false" wire:click="changeStatus()">
                    Konfirmasi
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" @click="showConfirm = false">
                    Cancel
                </button>
            </x-slot>
            Ubah Status Ini?
        </x-model>
    </div>
    @else
        <x-card><div class="pt-2">Tidak Ada Data Ditemukan</div></x-card>
    @endif
</div>
