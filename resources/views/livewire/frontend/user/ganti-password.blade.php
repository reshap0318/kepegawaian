<div>
  <x-slot name="title"> Ganti Password  {{ Auth()->user()->pegawai->nama }} </x-slot>
  <x-slot name="header">
    <div class="max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Ganti Password  {{ Auth()->user()->pegawai->nama }}</h1>
    </div>
</x-slot>
  <div class="pt-2">
    <x-card>
      <form wire:submit.prevent="update">
        <div class="px-4 pt-3">
            <x-form.label for="old_password" value="Old Password" />
            <x-form.input wire:model.lazy="old_password" id="old_password" class="block mt-1 w-full" type="password" autofocus autocomplete="off"/>
            <x-form.validation-error name="old_password"/>
        </div>
        <div class="px-4 pt-3">
            <x-form.label for="new_password" value="New Password" />
            <x-form.input wire:model.lazy="new_password" id="new_password" class="block mt-1 w-full" type="password" autofocus autocomplete="off"/>
            <x-form.validation-error name="new_password"/>
        </div>
        <div class="px-4 pt-3">
            <x-form.label for="confirm_password" value="Confirm Password" />
            <x-form.input wire:model.lazy="confirm_password" id="confirm_password" class="block mt-1 w-full" type="password" autofocus autocomplete="off"/>
            <x-form.validation-error name="confirm_password"/>
        </div>
        <div class="px-4 py-3 text-right sm:px-6">
          <x-form.button color="indigo"> Simpan </x-form.button>
        </div>
      </form>
    </x-card>
  </div>
</div>
  