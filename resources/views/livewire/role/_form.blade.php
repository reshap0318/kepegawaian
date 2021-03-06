
<div class="px-4 py-5 bg-white sm:p-6">
    <div class="grid grid-cols-6 gap-6">              
        <div class="col-span-6">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input wire:model.lazy="name" type="text" id="name" autocomplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
        <x-validation-form-error name="name"/>
        </div>        
    </div>
    <div class="mt-4 space-y-4">
        @foreach ($permit as $perm)
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input wire:model.lazy="permissions" id="perm_{{$perm->name}}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" value="{{ $perm->name }}">
                </div>
                
                <div class="ml-3 text-sm">
                    <label for="perm_{{$perm->name}}" class="font-medium text-gray-700">{{ $perm->name }}</label>
                    <p class="text-gray-500">{{ $perm->desc }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
