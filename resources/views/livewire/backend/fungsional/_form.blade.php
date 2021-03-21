<div class="px-4 pt-3">
    <x-form.label for="nama" value="nama" />
    <x-form.input wire:model.lazy="nama" id="nama" class="block mt-1 w-full" type="text" required autofocus autocomplete="off"/>
    <x-form.validation-error name="nama"/>
</div>

<div class="px-4 pt-3">
    <x-form.label for="grade" value="grade" />
    <x-form.input wire:model.lazy="grade" id="grade" class="block mt-1 w-full" type="text" required autocomplete="off"/>
    <x-form.validation-error name="grade"/>
</div>
