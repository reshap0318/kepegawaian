<div class="px-4 py-5 bg-white sm:p-6">
    <x-label for="permission" value="Permission" />
    <x-input wire:model.lazy="permission" id="permission" class="block mt-1 w-full" type="text" required autofocus autocomplete="off"/>
    <x-validation-form-error name="permission"/>
</div>
