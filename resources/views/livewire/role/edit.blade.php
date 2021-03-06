<div>
    <x-slot name="title"> Ubah Role {{ $role->name }} </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form wire:submit.prevent="update">
                      <div class="shadow overflow-hidden sm:rounded-md">
                        @include('livewire.role._form')
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>

            </div>
        </div>
    </div>
</div>
