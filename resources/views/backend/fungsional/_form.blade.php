<div class="px-4 pt-3">
    <x-label for="nama" value="nama" />
    <x-input wire:model.lazy="nama" id="nama" class="block mt-1 w-full" type="text" required autofocus autocomplete="off"/>
    <x-validation-form-error name="nama"/>
</div>

<div class="px-4 pt-3">
    <x-label for="grade" value="grade" />
    <x-input wire:model.lazy="grade" id="grade" class="block mt-1 w-full" type="text" required autocomplete="off"/>
    <x-validation-form-error name="grade"/>
</div>
