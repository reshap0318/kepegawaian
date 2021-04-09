<div class="px-4 pt-3">
    <x-form.label for="nama" value="nama" />
    <x-form.input wire:model.lazy="nama" id="nama" class="block mt-1 w-full" type="text" required autofocus autocomplete="off"/>
    <x-form.validation-error name="nama"/>
</div>