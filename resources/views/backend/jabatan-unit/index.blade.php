<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Jabatan Units </x-slot>
    <x-card>
        <x-slot name="btn"> 
            <div class="text-right pb-3">
                <x-button class="ml-3 normal-case" color="indigo" href="{{ route('jabatanUnits.create') }}">
                    Tambah
                </x-button>
            </div>
        </x-slot>
        @if (count($jabatanUnits) > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Unit
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Grade
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Corporate Grade
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($jabatanUnits as $jabatanUnit)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $jabatanUnit->nama }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $jabatanUnit->unit->nama}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $jabatanUnit->grade}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $jabatanUnit->corporate_grade}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-button class="normal-case" px="3" py="1" color="indigo" href="{{ route('jabatanUnits.edit',$jabatanUnit) }}">
                                    Edit
                                </x-button>
                                <x-button class="normal-case" px="3" py="1" color="red">
                                    Delete
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>                
        @else 
            <div class="p-6 bg-white border-b border-gray-200">
                Tidak Ada Data Ditemukan
            </div> 
        @endif
    </x-card>
</div>
