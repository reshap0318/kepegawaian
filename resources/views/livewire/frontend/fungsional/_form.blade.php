
<div class="px-4 pt-3">
    <x-form.label for="fungsional" value="fungsional" />
    <x-form.select wire:model.lazy="fungsional">
        <option value="">--Pilihan--</option>
        @foreach ($fungsionals as $fungsional)
            <option value="{{ $fungsional->id }}">{{ $fungsional->nama }}</option>
        @endforeach
    </x-form.select>
    <x-form.validation-error name="fungsional"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="tmt" value="tmt" />
    <x-form.input wire:model.lazy="tmt" id="tmt" class="block mt-1 w-full" type="date" autocomplete="off"/>
    <x-form.validation-error name="tmt"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="file_sk" value="File SK" />
    <x-form.input wire:model="file_sk" id="file_sk" class="block mt-1 w-full" type="file" autocomplete="off"/>
    @if (Request::is('*edit'))
        <a href="{{ $pegawaiFungsional->file_sk_url }}" target="blank" class="block font-medium text-sm text-blue-700">{{ $pegawaiFungsional->file_sk }}</a>
    @endif
    <div wire:loading wire:target="file_sk">Uploading...</div>
    <x-form.validation-error name="file_sk"/>
</div>

