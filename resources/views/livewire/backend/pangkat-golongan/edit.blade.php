<div>
  <x-slot name="title"> Ubah Pangkat Golongan {{ $pangkatGolongan->name }} </x-slot>
  <div class="pt-2">
    <x-card>
      <form wire:submit.prevent="update">
        @include('livewire.backend.pangkat-golongan._form')
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <x-form.button color="indigo"> Simpan </x-form.button>
        </div>
      </form>
    </x-card>
  </div>
</div>
