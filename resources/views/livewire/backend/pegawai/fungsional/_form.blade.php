
<div class="px-4 pt-3">
    <x-label for="fungsional" value="fungsional" />
    <x-select wire:model.lazy="fungsional">
        <option value="">--Pilihan--</option>
        @foreach ($fungsionals as $fungsional)
            <option value="{{ $fungsional->id }}">{{ $fungsional->nama }}</option>
        @endforeach
    </x-select>
    <x-validation-form-error name="fungsional"/>
</div>

<div class="px-4 pt-3">
    <x-label for="tmt" value="tmt" />
    <x-input wire:model.lazy="tmt" id="tmt" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-validation-form-error name="tmt"/>
</div>

<div class="px-4 pt-3">
    <x-label for="file_sk" value="File SK" />
    <x-input wire:model.lazy="file_sk" id="file_sk" class="block mt-1 w-full" type="file" autocomplete="off"/>
    <x-validation-form-error name="file_sk"/>
</div>

