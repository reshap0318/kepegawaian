<div>
  <x-slot name="title"> Tambah Pegawai Mutasi </x-slot>
  <x-card>
    <form wire:submit.prevent="store">
      @include('livewire.backend.pegawai.mutasi._form')
      <div class="px-4 py-3 text-right sm:px-6">
        <x-form.button color="indigo"> Simpan </x-form.button>
      </div>
    </form>
  </x-card>
</div>