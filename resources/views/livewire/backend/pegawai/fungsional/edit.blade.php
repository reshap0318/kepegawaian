<div>
  <x-slot name="title"> Ubah Pegawai Fungsional </x-slot>
  <x-card>
      <form wire:submit.prevent="update">
          @include('livewire.backend.pegawai.fungsional._form')
          <div class="px-4 py-3 text-right sm:px-6">
            <x-form.button color="indigo"> Simpan </x-form.button>
          </div>
      </form>
  </x-card>
</div>
