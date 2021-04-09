<div>
  <x-slot name="title"> Ubah Data Diri </x-slot>
  <form wire:submit.prevent="update">
    @include('livewire.frontend.user._form')
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
      <x-form.button color="indigo"> Simpan </x-form.button>
    </div>
  </form>
</div>
  