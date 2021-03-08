<div>
    <x-slot name="title"> Ganti Password </x-slot>
    <x-card>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="update">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 pt-3">
                <x-label for="old_password" value="Old Password" />
                <x-input wire:model.lazy="old_password" id="old_password" class="block mt-1 w-full" type="password" autofocus autocomplete="off"/>
                <x-validation-form-error name="old_password"/>
            </div>
            <div class="px-4 pt-3">
                <x-label for="new_password" value="New Password" />
                <x-input wire:model.lazy="new_password" id="new_password" class="block mt-1 w-full" type="password" autofocus autocomplete="off"/>
                <x-validation-form-error name="new_password"/>
            </div>
            <div class="px-4 pt-3">
                <x-label for="confirm_password" value="Confirm Password" />
                <x-input wire:model.lazy="confirm_password" id="confirm_password" class="block mt-1 w-full" type="password" autofocus autocomplete="off"/>
                <x-validation-form-error name="confirm_password"/>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <x-button color="indigo"> Simpan </x-button>
            </div>
          </div>
        </form>
      </div>
    </x-card>
  </div>
  