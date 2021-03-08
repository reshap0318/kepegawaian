
<div class="px-4 py-5 bg-white sm:p-6">
    <x-label for="name" value="Name" />
    <x-input wire:model.lazy="name" id="name" class="block mt-1 w-full" type="text" required autofocus autocomplete="off"/>
    <x-validation-form-error name="name"/>
    <div class="mt-4 space-y-4">
        @foreach ($permit as $perm)
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <x-input wire:model.lazy="permissions" id="perm_{{$perm->name}}" type="checkbox" :value="$perm->name"/>
                </div>
                
                <div class="ml-3 text-sm">
                    <x-label for="perm_{{$perm->name}}" :value="$perm->name" />
                    <p class="text-gray-500">{{ $perm->desc }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
