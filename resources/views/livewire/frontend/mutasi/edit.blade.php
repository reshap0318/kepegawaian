<div>
  <x-slot name="title"> Update Pegawai Mutasi </x-slot>
  <x-card>
    <form wire:submit.prevent="update">
      @include('livewire.frontend.mutasi._form')
      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <x-form.button color="indigo"> Simpan </x-form.button>
      </div>
    </form>
  </x-card>
</div>