
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
    <x-label for="tmt" value="tmt" />
    <x-input wire:model.lazy="tmt" id="tmt" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-validation-form-error name="tmt"/>
</div>

<div class="px-4 pt-3">
    <x-label for="file_sk" value="file_sk" />
    <x-input wire:model.lazy="file_sk" id="file_sk" class="block mt-1 w-full" type="file" autocomplete="off"/>
    <x-validation-form-error name="file_sk"/>
</div>

