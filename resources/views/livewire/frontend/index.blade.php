<div>
    <x-slot name="title"> Pegawai </x-slot>

    <div class="max-w-3xl mx-auto pt-3 px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
        <div class="flex items-center space-x-5">
            <div class="flex-shrink-0">
                <div class="relative">
                    <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                    <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ Auth()->user()->pegawai->nama }}</h1>
                <p class="text-sm font-medium text-gray-500">Sebagai {{ Auth()->user()->roles()->first()->name }} di {{ Auth()->user()->pegawai->unit->nama }}</p>
            </div>
        </div>
        <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
            <a href="{{ route('frontend.pegawai.edit') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </a>
        </div>
    </div>
</div>

    <div class="mt-4 mb-4 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        <div class="space-y-6 lg:col-start-1 lg:col-span-3">
            <!-- Description list-->
            <section aria-labelledby="informasi-akun">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h2 id="informasi-akun" class="text-lg leading-6 font-medium text-gray-900">
                            Informasi Akun
                        </h2>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <dl class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Email
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->email }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Username
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->username ?? "Belum Disetting" }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </section>

            <section aria-labelledby="informasi-pegawai">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h2 id="informasi-pegawai" class="text-lg leading-6 font-medium text-gray-900">
                            Informasi Pegawai
                        </h2>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <dl class="grid grid-cols-3 gap-x-4 gap-y-8">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Nama
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->nama_lengkap ?? "Belum Disetting" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Nip
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->nip ?? "Belum Disetting" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Unit
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->unit->nama }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    No Hp
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->no_hp ?? "000 000 0000" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Jenis Kelamin
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->jenis_kelamin_text }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Tempat, Tanggal Lahir
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->tempat_lahir. ", ".$user->pegawai->tgl_lahir }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    NIDN
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->nidn ?? "Belun Disetting" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    NPWP
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->npwp ?? "Belun Disetting" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Tipe
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->tipe_pegawai_text ?? "Belun Disetting" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Ikatan Kerja
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->ikatan_kerja ? "Ya" : "Tidak" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Tanggal Pensiun
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->tgl_pensiun ?? "Belun Disetting" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Status
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->status ?? "Belun Disetting" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-3">
                                <dt class="text-sm font-medium text-gray-500">
                                    Alamat
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $user->pegawai->alamat ?? "Belun Disetting" }}
                                </dd>
                            </div>
                            <div class="sm:col-span-3">
                                <dt class="text-sm font-medium text-gray-500">
                                    File
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                            <!-- Heroicon name: solid/paper-clip -->
                                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="ml-2 flex-1 w-0 truncate">
                                                    Surat_Keputusan_Calon_Pegawai_Negeri_Sipil.pdf
                                                </span>
                                            </div> 
                                            <div class="ml-4 flex-shrink-0 flex items-start space-x-4">
                                                <a href="#" class="bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" onclick="document.getElementById('file_sk_cpns').click()">
                                                    Update
                                                </a> 
                                                <input type="file" wire:model="file_sk_cpns" style="display: none" id="file_sk_cpns">
                                                @if ($user->pegawai->file_sk_cpns)
                                                <span class="text-gray-300" aria-hidden="true">|</span>
                                                <a href="{{ $user->pegawai->file_sk_cpns_url }}" target="blank" class="bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                                    Download
                                                </a>
                                                @endif
                                            </div>
                                        </li>
                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                            <!-- Heroicon name: solid/paper-clip -->
                                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="ml-2 flex-1 w-0 truncate">
                                                    Surat_Keputusan_Pegawai_Negeri_Sipil.pdf
                                                </span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0 flex items-start space-x-4">
                                                <a href="#" class="bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" onclick="document.getElementById('file_sk_pns').click()">
                                                    Update
                                                </a>
                                                <input type="file" wire:model="file_sk_pns" style="display: none" id="file_sk_pns">
                                                @if ($user->pegawai->file_sk_pns)
                                                <span class="text-gray-300" aria-hidden="true">|</span>
                                                <a href="{{ $user->pegawai->file_sk_pns_url }}" target="blank" class="bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                                    Download
                                                </a>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </section>

            <section aria-labelledby="informasi Fungsional2" class="space-y-6">
                <x-card>
                    <livewire:frontend.fungsional.index :key="'user-fungsional-'.$user->id">
                </x-card>
                <x-card>
                    <livewire:frontend.jabatan.index :key="'user-jabatan-'.$user->id">
                </x-card>
                <x-card>
                    <livewire:frontend.pangkat.index :key="'user-pangkat-'.$user->id">
                </x-card>
                <x-card>
                    <livewire:frontend.mutasi.index :key="'user-mutasi-'.$user->id">
                </x-card>
            </section>
        </div>    
    </div>
</div>
  