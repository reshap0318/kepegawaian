<div class="px-4 pt-3">
    <x-label for="nama" value="nama" />
    <x-input wire:model.lazy="nama" id="nama" class="block mt-1 w-full" type="text" required autofocus autocomplete="off"/>
    <x-validation-form-error name="nama"/>
</div>

<div class="px-4 pt-3">
    <x-label for="golongan" value="golongan" />
    <x-input wire:model.lazy="golongan" id="golongan" class="block mt-1 w-full" type="text" required autocomplete="off"/>
    <x-validation-form-error name="golongan"/>
</div>
