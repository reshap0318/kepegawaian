<div class="px-4 pt-3">
    <x-form.label for="name" value="Name" />
    <x-form.input wire:model.lazy="name" id="name" class="block mt-1 w-full" type="text" required autofocus autocomplete="off"/>
    <x-form.validation-error name="name"/>
    <div class="mt-3 grid grid-cols-4">
        @foreach ($permit as $perm)
            <div class="flex items-start mt-1">
                <div class="flex items-center h-5">
                    <x-form.input wire:model.lazy="permissions" id="perm_{{$perm->name}}" type="checkbox" :value="$perm->name"/>
                </div>
                
                <div class="ml-3 text-sm">
                    <x-form.label for="perm_{{$perm->name}}" :value="$perm->name" />
                    <p class="text-gray-500">{{ $perm->desc }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
