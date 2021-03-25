
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
    <x-form.label for="file_sk" value="File SK" />
    <x-form.input wire:model.lazy="file_sk" id="file_sk" class="block mt-1 w-full" type="file" autocomplete="off"/>
    @if (Request::is('*edit'))
        <a href="{{ $pegawaiPangkat->file_sk_url }}" target="blank" class="block font-medium text-sm text-blue-700">{{ $pegawaiPangkat->file_sk }}</a>
    @endif
    <x-form.validation-error name="file_sk"/>
</div>

