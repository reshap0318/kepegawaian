<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Permissions </x-slot>
    <x-card>
        <x-slot name="btn"> 
            <div class="text-right pb-3">
                <x-button class="ml-3 normal-case" color="indigo" href="{{ route('roles.create') }}" href="{{ route('permisssions.create') }}">
                    Tambah
                </x-button>
            </div>
        </x-slot>
        @if (count($permissions) > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Permissions
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $permission->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-button class="normal-case" px="3" py="1" color="indigo" href="{{ route('permisssions.edit',$permission) }}">
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
