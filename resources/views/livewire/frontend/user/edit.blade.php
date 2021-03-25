<div>
    <x-slot name="title"> Ubah Pegawai </x-slot>
    <form wire:submit.prevent="update">
      @include('livewire.frontend.user._form')
      <div class="px-4 py-3 text-right sm:px-6">
        <x-form.button color="indigo"> Simpan </x-form.button>
      </div>
    </form>
  </div>
    