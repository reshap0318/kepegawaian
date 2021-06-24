<div class="flex-1 flex justify-between sm:hidden">
<!-- Previous Page Link -->
@if ($paginator->onFirstPage())
<div class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md bg-white text-gray-400 bg-gray-50">
    <x-icons.arrow-left />
    Previous
</div>
@else
<button wire:click="previousPage" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md bg-white text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
    <x-icons.arrow-left />
    Previous
</button>
@endif



<!-- Next Page pnk -->
@if ($paginator->hasMorePages())
<button wire:click="nextPage" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
    Next
    <x-icons.arrow-right />
</button>
@else
<div class="w-32 flex justify-between items-center relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-400 bg-gray-50">
    Next
    <x-icons.arrow-right class="inline" />
</div>
@endif
</div>
