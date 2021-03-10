<div>
    <x-slot name="title"> Ubah Jabatan Unit {{ $jabatanUnit->nama }} </x-slot>
    <x-card>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="update">
          <div class="shadow overflow-hidden sm:rounded-md">
            @include('backend.jabatan-unit._form')
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <x-button color="indigo"> Simpan </x-button>
            </div>
          </div>
        </form>
      </div>
    </x-card>
  </div>
  