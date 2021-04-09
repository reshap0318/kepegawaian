<div>
  <x-slot name="title"> Ubah Role {{ $role->name }} </x-slot>
  <x-slot name="header">
      <div class="max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
          <h1 class="text-2xl font-semibold text-gray-900">Ubah Role {{ $role->name }}</h1>
      </div>
  </x-slot>
  <div class="pt-2">
    <x-card>
      <form wire:submit.prevent="update">
        @include('livewire.backend.role._form')
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <x-form.button color="indigo"> Simpan </x-form.button>
        </div>
      </form>
    </x-card>
  </div>
</div>
