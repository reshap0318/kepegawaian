<div class="px-4 pt-3">
    <x-label for="nama" value="nama" />
    <x-input wire:model.lazy="nama" id="nama" class="block mt-1 w-full" type="text" autofocus autocomplete="off"/>
    <x-validation-form-error name="nama"/>
</div>

<div class="px-4 pt-3">
    <x-label for="parent_unit_id" value="Unit Parent" />
    <x-select wire:model.lazy="parent_unit">
        <option value="">--Master--</option>
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
        @endforeach
    </x-select>
    <x-validation-form-error name="parent_unit"/>
</div>
