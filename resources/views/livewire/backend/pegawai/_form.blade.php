
<div class="px-4 pt-3">
    <x-form.label for="email" value="Email" />
    <x-form.input wire:model.lazy="email" id="email" class="block mt-1 w-full" type="email" autofocus autocomplete="off"/>
    <x-form.validation-error name="email"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="username" value="Username" />
    <x-form.input wire:model.lazy="username" id="username" class="block mt-1 w-full" type="text" autocomplete="off"/>
    <x-form.validation-error name="username"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="nama" value="Nama" />
    <x-form.input wire:model.lazy="nama" id="nama" class="block mt-1 w-full" type="text" autocomplete="off"/>
    <x-form.validation-error name="nama"/>
</div>

@if (Request::is('*create'))
<div class="px-4 pt-3 space-y-4">
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
        <div class="px-4 pt-3">
            <x-form.label for="gelar_depan" value="Gelar Depan" />
            <x-form.input wire:model.lazy="gelar_depan" id="gelar_depan" class="block mt-1 w-full" type="text" autocomplete="off"/>
            <x-form.validation-error name="gelar_depan"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="gelar_belakang" value="Gelar Belakang" />
            <x-form.input wire:model.lazy="gelar_belakang" id="gelar_belakang" class="block mt-1 w-full" type="text" autocomplete="off"/>
            <x-form.validation-error name="gelar_belakang"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="nip" value="NIP" />
            <x-form.input wire:model.lazy="nip" id="nip" class="block mt-1 w-full" type="text" autocomplete="off"/>
            <x-form.validation-error name="nip"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="unit" value="Unit" />
            <x-form.select wire:model.lazy="unit">
                <option value="">--Pilihan--</option>
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
                @endforeach
            </x-form.select>
            <x-form.validation-error name="unit"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="jenis_kelamin" value="Jenis Kelamin" />
            <x-form.select wire:model.lazy="jenis_kelamin">
                <option value="">--Pilihan--</option>
                <option value="1">Laki - Laki</option>
                <option value="0">Perempuan</option>
            </x-form.select>
            <x-form.validation-error name="jenis_kelamin"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="tempat_lahir" value="Tempat Lahir" />
            <x-form.input wire:model.lazy="tempat_lahir" id="tempat_lahir" class="block mt-1 w-full" type="text" autocomplete="off"/>
            <x-form.validation-error name="tempat_lahir"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="tanggal_lahir" value="Tanggal Lahir" />
            <x-form.input wire:model.lazy="tanggal_lahir" id="tanggal_lahir" class="block mt-1 w-full" type="date" autocomplete="off"/>
            <x-form.validation-error name="tanggal_lahir"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="nidn" value="NIDN" />
            <x-form.input wire:model.lazy="nidn" id="nidn" class="block mt-1 w-full" type="text" autocomplete="off"/>
            <x-form.validation-error name="nidn"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="npwp" value="NPWP" />
            <x-form.input wire:model.lazy="npwp" id="npwp" class="block mt-1 w-full" type="text" autocomplete="off"/>
            <x-form.validation-error name="npwp"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="tipe" value="Tipe" />
            <x-form.input wire:model.lazy="tipe" id="tipe" class="block mt-1 w-full" type="text" autocomplete="off"/>
            <x-form.validation-error name="tipe"/>
        </div>
    
        <div class="px-4 pt-3 space-y-4">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <x-form.input wire:model.lazy="ikatan_kerja" id="ikatan_kerja" type="checkbox"/>
                    <x-form.label class="ml-5" for="ikatan_kerja" value="Ikatan Kerja?" />
                </div>
            </div>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="no_hp" value="No Hp" />
            <x-form.input wire:model.lazy="no_hp" id="no_hp" class="block mt-1 w-full" type="text" autocomplete="off"/>
            <x-form.validation-error name="no_hp"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="status" value="Status" />
            <x-form.input wire:model.lazy="status" id="status" class="block mt-1 w-full" type="text" autocomplete="off"/>
            <x-form.validation-error name="status"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="tanggal_pensiun" value="Tanggal Pensiun" />
            <x-form.input wire:model.lazy="tanggal_pensiun" id="tanggal_pensiun" class="block mt-1 w-full" type="date" autocomplete="off"/>
            <x-form.validation-error name="tanggal_pensiun"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="file_sk_cpns" value="File SK CPNS" />
            <x-form.input wire:model.lazy="file_sk_cpns" id="file_sk_cpns" class="block mt-1 w-full" type="file" autocomplete="off"/>
            <x-form.validation-error name="file_sk_cpns"/>
        </div>
    
        <div class="px-4 pt-3">
            <x-form.label for="file_sk_pns" value="File SK PNS" />
            <x-form.input wire:model.lazy="file_sk_pns" id="file_sk_pns" class="block mt-1 w-full" type="file" autocomplete="off"/>
            <x-form.validation-error name="file_sk_pns"/>
        </div>
    </div>
</div>

<div class="px-4 pt-3">
    <x-form.label for="password" value="New Password" />
    <x-form.input wire:model.lazy="password" id="password" class="block mt-1 w-full" type="password" autocomplete="off"/>
    <x-form.validation-error name="password"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="confirm_password" value="Confirm Password" />
    <x-form.input wire:model.lazy="confirm_password" id="confirm_password" class="block mt-1 w-full" type="password" autocomplete="off"/>
    <x-form.validation-error name="confirm_password"/>
</div>