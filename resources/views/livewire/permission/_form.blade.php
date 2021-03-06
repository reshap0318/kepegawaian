
<div class="px-4 py-5 bg-white sm:p-6">
    <div class="grid grid-cols-6 gap-6">              
        <div class="col-span-6">
        <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
        <input wire:model.lazy="permission" type="text" id="permission" autocomplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
        <x-validation-form-error name="permission"/>
        </div>        
    </div>
</div>