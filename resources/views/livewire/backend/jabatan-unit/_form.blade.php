<div class="px-4 pt-3">
    <x-form.label for="nama" value="nama" />
    <x-form.input wire:model.lazy="nama" id="nama" class="block mt-1 w-full" type="text" autofocus autocomplete="off"/>
    <x-form.validation-error name="nama"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="grade" value="Grade" />
    <x-form.input wire:model.lazy="grade" id="grade" class="block mt-1 w-full" type="text" autocomplete="off"/>
    <x-form.validation-error name="grade"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="corporate_grade" value="Corporate Grade" />
    <x-form.input wire:model.lazy="corporate_grade" id="corporate_grade" class="block mt-1 w-full" type="text" autocomplete="off"/>
    <x-form.validation-error name="corporate_grade"/>
</div>

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
    <x-form.label for="parent_jabatan_unit" value="Jabatan Unit Parent" />
    <x-form.select wire:model.lazy="parent_jabatan_unit">
        <option value="">--Master--</option>
        @foreach ($jabatanUnits as $jabatanUnit)
            <option value="{{ $jabatanUnit->id }}">{{ $jabatanUnit->nama.' ('.$jabatanUnit->unit->nama.')' }}</option>
        @endforeach
    </x-form.select>
    <x-form.validation-error name="parent_jabatan_unit"/>
</div>
