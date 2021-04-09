<div>
  <x-slot name="title"> Ubah Pegawai Fungsional </x-slot>
  <x-card class="mb-1">     
    @component('components.form.data-user', ['user' => $user])@endcomponent
  </x-card>
  <x-card>
      <form wire:submit.prevent="update">
          @include('livewire.frontend.fungsional._form')
          <div class="px-4 py-3 text-right sm:px-6">
            <x-form.button color="indigo"> Simpan </x-form.button>
          </div>
      </form>
  </x-card>
</div>