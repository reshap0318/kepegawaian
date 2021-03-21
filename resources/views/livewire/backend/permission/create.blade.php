<div>
  <x-slot name="title"> Tambah Permission </x-slot>
  <div class="pt-3">
    <x-card>
      <form wire:submit.prevent="store">
        @include('livewire.backend.permission._form')
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <x-form.button color="indigo"> Simpan </x-form.button>
        </div>
      </form>
    </x-card>
  </div>
</div>
