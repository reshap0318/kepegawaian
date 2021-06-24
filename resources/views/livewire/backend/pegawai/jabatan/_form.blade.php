
<div class="px-4 pt-3">
    <x-form.label for="jabatan" value="jabatan" />
    <x-form.select wire:model.lazy="jabatan">
        <option value="">--Pilihan--</option>
        @foreach ($jabatanUnits as $jabatanUnit)
            <option value="{{ $jabatanUnit->id }}">{{ $jabatanUnit->nama.' ('.$jabatanUnit->unit->nama.')' }}</option>
        @endforeach
    </x-form.select>
    <x-form.validation-error name="jabatan"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="tanggal_mulai" value="Tanggal Mulai" />
    <x-form.input wire:model.lazy="tanggal_mulai" id="tanggal_mulai" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-form.validation-error name="tanggal_mulai"/>
</div> 

<div class="px-4 pt-3">
    <x-form.label for="tanggal_selesai" value="Tanggal Selesai" />
    <x-form.input wire:model.lazy="tanggal_selesai" id="tanggal_selesai" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-form.validation-error name="tanggal_selesai"/>
</div> 

<div class="px-4 pt-3">
    <x-form.label for="file_sk" value="File Sk" />
    <x-form.input wire:model="file_sk" id="file_sk" class="block mt-1 w-full" type="file" autocomplete="off"/>
    @if (Request::is('*edit'))
        <a href="{{ $pegawaiJabatan->file_sk_url }}" target="blank" class="block font-medium text-sm text-blue-700">{{ $pegawaiJabatan->file_sk }}</a>
    @endif
    <div wire:loading wire:target="file_sk">Uploading...</div>
    <x-form.validation-error name="file_sk"/>
</div>

