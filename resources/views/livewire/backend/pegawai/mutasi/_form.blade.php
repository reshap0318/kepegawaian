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
    <x-form.label for="tanggal_mutasi" value="Tanggal Mutasi" />
    <x-form.input wire:model.lazy="tanggal_mutasi" id="tanggal_mutasi" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-form.validation-error name="tanggal_mutasi"/>
</div> 

<div class="px-4 pt-3">
    <x-form.label for="file_sk" value="File SK" />
    <x-form.input wire:model="file_sk" id="file_sk" class="block mt-1 w-full" type="file" autocomplete="off"/>
    @if (Request::is('*edit'))
        <a href="{{ $mutasi->file_sk_url }}" target="blank" class="block font-medium text-sm text-blue-700">{{ $mutasi->file_sk }}</a>
    @endif
    <div wire:loading wire:target="file_sk">Uploading...</div>
    <x-form.validation-error name="file_sk"/>
</div>