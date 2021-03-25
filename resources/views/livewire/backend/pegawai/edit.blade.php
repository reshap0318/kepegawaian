<div>
  <x-slot name="title"> Ubah Pegawai {{ $user->name }} </x-slot>
  <form wire:submit.prevent="update">
    @include('livewire.backend.pegawai._form')
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
      <x-form.button color="indigo"> Simpan </x-form.button>
    </div>
  </form>
</div>
  