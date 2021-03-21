<div>
    <x-slot name="title"> Ubah Pegawai Pangkat  </x-slot>
    <x-card>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="update">
          <div class="shadow overflow-hidden sm:rounded-md">
            @include('livewire.backend.pegawai.pangkat._form')
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <x-form.button color="indigo"> Simpan </x-form.button>
            </div>
          </div>
        </form>
      </div>
    </x-card>
  </div>
  