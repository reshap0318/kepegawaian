
<div class="px-4 pt-3">
    <x-form.label for="pangkat" value="pangkat" />
    <x-form.select wire:model.lazy="pangkat">
        <option value="">--Pilihan--</option>
        @foreach ($pangkatGolongans as $pangkatGolongan)
            <option value="{{ $pangkatGolongan->id }}">{{ $pangkatGolongan->nama }}</option>
        @endforeach
    </x-form.select>
    <x-form.validation-error name="pangkat"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="tmt" value="tmt" />
    <x-form.input wire:model.lazy="tmt" id="tmt" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-form.validation-error name="tmt"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="file_sk" value="file_sk" />
    <x-form.input wire:model.lazy="file_sk" id="file_sk" class="block mt-1 w-full" type="file" autocomplete="off"/>
    <x-form.validation-error name="file_sk"/>
</div>

