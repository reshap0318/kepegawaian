<div class="px-4 pt-3">
    <x-label for="unit" value="Unit" />
    <x-select wire:model.lazy="unit">
        <option value="">--Pilihan--</option>
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
        @endforeach
    </x-select>
    <x-validation-form-error name="unit"/>
</div>

<div class="px-4 pt-3">
    <x-label for="tanggal_mutasi" value="Tanggal Mutasi" />
    <x-input wire:model.lazy="tanggal_mutasi" id="tanggal_mutasi" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-validation-form-error name="tanggal_mutasi"/>
</div> 

<div class="px-4 pt-3">
    <x-label for="file_sk" value="File Sk" />
    <x-input wire:model.lazy="file_sk" id="file_sk" class="block mt-1 w-full" type="file" autocomplete="off"/>
    <x-validation-form-error name="file_sk"/>
</div>