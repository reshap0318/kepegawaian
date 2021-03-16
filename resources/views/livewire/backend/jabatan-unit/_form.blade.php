<div class="px-4 pt-3">
    <x-label for="nama" value="nama" />
    <x-input wire:model.lazy="nama" id="nama" class="block mt-1 w-full" type="text" autofocus autocomplete="off"/>
    <x-validation-form-error name="nama"/>
</div>

<div class="px-4 pt-3">
    <x-label for="grade" value="Grade" />
    <x-input wire:model.lazy="grade" id="grade" class="block mt-1 w-full" type="text" autocomplete="off"/>
    <x-validation-form-error name="grade"/>
</div>

<div class="px-4 pt-3">
    <x-label for="corporate_grade" value="Corporate Grade" />
    <x-input wire:model.lazy="corporate_grade" id="corporate_grade" class="block mt-1 w-full" type="text" autocomplete="off"/>
    <x-validation-form-error name="corporate_grade"/>
</div>

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
