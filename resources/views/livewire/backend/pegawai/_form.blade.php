<x-card>
    <div class="divide-y divide-gray-200 lg:col-span-9">
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div class="flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-form.label for="email" value="Email" />
                            <x-form.input wire:model.lazy="email" id="email" class="block mt-1 w-full" type="email" autofocus autocomplete="off"/>
                            <x-form.validation-error name="email"/>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-form.label for="username" value="Username" />
                            <x-form.input wire:model.lazy="username" id="username" class="block mt-1 w-full" type="text" autocomplete="off"/>
                            <x-form.validation-error name="username"/>
                        </div>
                    </div>
                        
                    <div class="grid grid-cols-9 gap-6">
                        <div class="col-span-9 sm:col-span-3">
                            <x-form.label for="password" value="New Password" />
                            <x-form.input wire:model.lazy="password" id="password" class="block mt-1 w-full" type="password" autocomplete="off"/>
                            <x-form.validation-error name="password"/>
                        </div>
                        <div class="col-span-9 sm:col-span-3">
                            <x-form.label for="confirm_password" value="Confirm Password" />
                            <x-form.input wire:model.lazy="confirm_password" id="confirm_password" class="block mt-1 w-full" type="password" autocomplete="off"/>
                            <x-form.validation-error name="confirm_password"/>
                        </div>
                        <div class="col-span-9 sm:col-span-3">
                            <x-form.label for="role" value="Role" />
                            <x-form.select wire:model.lazy="role">
                                <option value="">--Pilihan--</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>                  
                                @endforeach
                            </x-form.select>
                            <x-form.validation-error name="role"/>
                        </div>
                    </div>
                </div>
                @if (Request::is('*create'))
                    <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                        <p class="text-sm font-medium text-gray-700" aria-hidden="true">
                            Photo
                        </p>

                        <div class="mt-1 lg:hidden">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-10 w-10" aria-hidden="true">
                                    <img class="rounded-full h-full w-full" src="{{ $avatar ?? asset('image/avatar-default.png') }}" alt="">
                                </div>
                                <div class="ml-5 rounded-md shadow-sm">
                                    <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-light-blue-500">
                                    <label for="user_photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                        <span>Change</span>
                                        <span class="sr-only"> user photo</span>
                                    </label>
                                    <input id="user_photo" wire::model="avatar" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="hidden relative rounded-full overflow-hidden lg:block">
                            <img class="relative rounded-full w-32 h-32" src="{{ $avatar ?? asset('image/avatar-default.png') }}" alt="">
                            <label for="user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                                <span>Change</span>
                                <span class="sr-only"> user photo</span>
                                <input type="file" id="user-photo" wire:model="avatar" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                            </label>
                        </div>
                        <x-form.validation-error name="avatar"/>
                    </div>
                @else   
                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                    <p class="text-sm font-medium text-gray-700" aria-hidden="true">
                        Photo
                    </p>

                    <div class="mt-1 lg:hidden">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-10 w-10" aria-hidden="true">
                                <img class="rounded-full h-full w-full" src="{{ $avatar != $user->pegawai->avatar_url ? $avatar->temporaryUrl() :  $avatar}}" alt="">
                            </div>
                            <div class="ml-5 rounded-md shadow-sm">
                                <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-light-blue-500">
                                <label for="user_photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                    <span>Change</span>
                                    <span class="sr-only"> user photo</span>
                                </label>
                                <input id="user_photo" wire::model="avatar" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="hidden relative rounded-full overflow-hidden lg:block">
                        <img class="relative rounded-full w-32 h-32" src="{{ $avatar != $user->pegawai->avatar_url ? $avatar->temporaryUrl() :  $avatar}}" alt="">
                        <label for="user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                            <span>Change</span>
                            <span class="sr-only"> user photo</span>
                            <input type="file" id="user-photo" wire:model="avatar" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </label>
                    </div>
                    <x-form.validation-error name="avatar"/>
                </div>
                @endif
            </div>
            @if (Request::is('*create') && false)
                <div class="pt-4 space-x-4">
                    <div class="flex items-start">
                        <div class="flex items-center">
                            <x-form.input wire:model.lazy="isPegawai" id="isPegawai" type="checkbox"/>
                            <x-form.label class="ml-5" for="isPegawai" value="Pegawai" />
                        </div>
                    </div>
                </div>
            @endif
            <div x-data="{ open: @entangle('isPegawai') }" >
                <div x-show="open">
                    <div class="mt-4 grid grid-cols-12 gap-5">
    
                        <div class="col-span-12 sm:col-span-8">
                            <x-form.label for="nip" value="NIP" />
                            <x-form.input wire:model.lazy="nip" id="nip" class="block mt-1 w-full" type="text" autocomplete="off"/>
                            <x-form.validation-error name="nip"/>
                        </div>
                
                        <div class="col-span-12 sm:col-start-1 sm:col-span-3">
                            <x-form.label for="gelar_depan" value="Gelar Depan" />
                            <x-form.input wire:model.lazy="gelar_depan" id="gelar_depan" class="block mt-1 w-full" type="text" autocomplete="off"/>
                            <x-form.validation-error name="gelar_depan"/>
                        </div>
                        
                        <div class="col-span-12 sm:col-span-6">
                            <x-form.label for="nama" value="Nama" />
                            <x-form.input wire:model.lazy="nama" id="nama" class="block mt-1 w-full" type="text" autocomplete="off"/>
                            <x-form.validation-error name="nama"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-3">
                            <x-form.label for="gelar_belakang" value="Gelar Belakang" />
                            <x-form.input wire:model.lazy="gelar_belakang" id="gelar_belakang" class="block mt-1 w-full" type="text" autocomplete="off"/>
                            <x-form.validation-error name="gelar_belakang"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-6">
                            <x-form.label for="nidn" value="NIDN" />
                            <x-form.input wire:model.lazy="nidn" id="nidn" class="block mt-1 w-full" type="text" autocomplete="off"/>
                            <x-form.validation-error name="nidn"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-6">
                            <x-form.label for="npwp" value="NPWP" />
                            <x-form.input wire:model.lazy="npwp" id="npwp" class="block mt-1 w-full" type="text" autocomplete="off"/>
                            <x-form.validation-error name="npwp"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-4">
                            <x-form.label for="unit" value="Unit" />
                            <x-form.select wire:model.lazy="unit">
                                <option value="">--Pilihan--</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
                                @endforeach
                            </x-form.select>
                            <x-form.validation-error name="unit"/>
                        </div>
    
                        <div class="col-span-12 sm:col-span-2">
                            <x-form.label for="jenis_kelamin" value="Jenis Kelamin" />
                            <x-form.select wire:model.lazy="jenis_kelamin">
                                <option value="">--Pilihan--</option>
                                <option value="1">Laki - Laki</option>
                                <option value="0">Perempuan</option>
                            </x-form.select>
                            <x-form.validation-error name="jenis_kelamin"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-3">
                            <x-form.label for="tempat_lahir" value="Tempat Lahir" />
                            <x-form.input wire:model.lazy="tempat_lahir" id="tempat_lahir" class="block mt-1 w-full" type="text" autocomplete="off"/>
                            <x-form.validation-error name="tempat_lahir"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-3">
                            <x-form.label for="tanggal_lahir" value="Tanggal Lahir" />
                            <x-form.input wire:model.lazy="tanggal_lahir" id="tanggal_lahir" class="block mt-1 w-full" type="date" autocomplete="off"/>
                            <x-form.validation-error name="tanggal_lahir"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-3">
                            <x-form.label for="tipe" value="Tipe" />
                            <x-form.select wire:model.lazy="tipe">
                                <option value="">--Pilihan--</option>
                                @foreach ($tipes as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>                         
                                @endforeach
                            </x-form.select>
                            <x-form.validation-error name="tipe"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-3">
                            <x-form.label for="no_hp" value="No Hp" />
                            <x-form.input wire:model.lazy="no_hp" id="no_hp" class="block mt-1 w-full" type="text" autocomplete="off"/>
                            <x-form.validation-error name="no_hp"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-3">
                            <x-form.label for="tanggal_pensiun" value="Tanggal Pensiun" />
                            <x-form.input wire:model.lazy="tanggal_pensiun" id="tanggal_pensiun" class="block mt-1 w-full" type="date" autocomplete="off"/>
                            <x-form.validation-error name="tanggal_pensiun"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-3">
                            <x-form.label for="ikatan_kerja" value="Ikatan Kerja" />
                            <x-form.select wire:model.lazy="ikatan_kerja">
                                <option value="">--Pilihan--</option>
                                @foreach ($ikatans as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>                         
                                @endforeach
                            </x-form.select>
                            <x-form.validation-error name="ikatan_kerja"/>
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <x-form.label for="alamat" value="Alamat" />
                            <div class="">
                                <textarea wire:model.lazy="alamat" rows="3" class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <x-form.validation-error name="file_sk_pns"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-3">
                            <x-form.label for="file_sk_cpns" value="File SK CPNS" />
                            <x-form.input wire:model="file_sk_cpns" id="file_sk_cpns" class="block mt-1 w-full" type="file" autocomplete="off"/>
                            @if (Request::is('*edit'))
                                <a href="{{ $user->pegawai->file_sk_cpns_url }}" target="blank" class="font-medium text-sm text-blue-700">{{ $user->pegawai->file_sk_cpns }}</a>
                            @endif
                            <div wire:loading wire:target="file_sk_cpns">Uploading...</div>
                            <x-form.validation-error name="file_sk_cpns"/>
                        </div>
                    
                        <div class="col-span-12 sm:col-span-3">
                            <x-form.label for="file_sk_pns" value="File SK PNS" />
                            <x-form.input wire:model="file_sk_pns" id="file_sk_pns" class="block mt-1 w-full" type="file" autocomplete="off"/>
                            @if (Request::is('*edit'))
                                <a href="{{ $user->pegawai->file_sk_pns_url }}" target="blank" class="block font-medium text-sm text-blue-700">{{ $user->pegawai->file_sk_pns }}</a>
                            @endif
                            <div wire:loading wire:target="file_sk_pns">Uploading...</div>
                            <x-form.validation-error name="file_sk_pns"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-card>