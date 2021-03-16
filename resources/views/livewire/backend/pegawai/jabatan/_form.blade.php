
<div class="px-4 pt-3">
    <x-label for="jabatan" value="jabatan" />
    <x-select wire:model.lazy="jabatan">
        <option value="">--Pilihan--</option>
        @foreach ($jabatanUnits as $jabatanUnit)
            <option value="{{ $jabatanUnit->id }}">{{ $jabatanUnit->nama }}</option>
        @endforeach
    </x-select>
    <x-validation-form-error name="jabatan"/>
</div>

<div class="px-4 pt-3">
    <x-label for="tanggal_mulai" value="Tanggal Mulai" />
    <x-input wire:model.lazy="tanggal_mulai" id="tanggal_mulai" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-validation-form-error name="tanggal_mulai"/>
</div> 

<div class="px-4 pt-3">
    <x-label for="tanggal_selesai" value="Tanggal Selesai" />
    <x-input wire:model.lazy="tanggal_selesai" id="tanggal_selesai" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-validation-form-error name="tanggal_selesai"/>
</div> 

<div class="px-4 pt-3">
    <x-label for="file_sk" value="File Sk" />
    <x-input wire:model.lazy="file_sk" id="file_sk" class="block mt-1 w-full" type="file" autocomplete="off"/>
    <x-validation-form-error name="file_sk"/>
</div>

