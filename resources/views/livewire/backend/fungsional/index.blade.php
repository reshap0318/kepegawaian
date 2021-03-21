<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Fungsional </x-slot>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto pt-2 px-4  sm:px-6 md:px-8">
            <div class="grid grid-cols-3">
                <h1 class="text-2xl font-semibold text-gray-900">Fungsionals</h1>
                <div class="text-right col-span-2">
                    <x-form.button class="ml-3 normal-case" color="indigo" href="{{ route('fungsionals.create') }}">
                        Tambah
                    </x-form.button>
                </div>
            </div>
        </div>
    </x-slot>
    @if (count($fungsionals) > 0)
        <x-table.init>
            <x-table.thead>
                <tr>
                    <x-table.th>Nama</x-table.th>
                    <x-table.th>Tingkat</x-table.th>
                    <x-table.th>Aksi</x-table.th>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($fungsionals as $fungsional)
                    <x-table.tr>
                        <x-table.td>{{ $fungsional->nama }}</x-table.td>
                        <x-table.td>{{ $fungsional->grade }}</x-table.td>
                        <x-table.td>
                            <x-form.button class="normal-case" px="3" py="1" color="indigo" href="{{ route('fungsionals.edit',$fungsional) }}">
                                Edit
                            </x-form.button>
                            <x-form.button class="normal-case" px="3" py="1" color="red">
                                Delete
                            </x-form.button>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table.init>
    @else
        <x-card><div class="pt-2">Tidak Ada Data Ditemukan</div></x-card>
    @endif
</div>
