<div class="mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-slot name="title"> Roles </x-slot>
    <x-card>
        <x-slot name="btn"> 
            <div class="text-right pb-3">
                <x-button class="ml-3 normal-case" color="indigo" href="{{ route('roles.create') }}">
                    Tambah
                </x-button>
            </div>
        </x-slot>
        @if (count($roles) > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Permissions
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($roles as $role)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $role->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    <h5>
                                        @foreach ($role->permissions()->pluck('name') as $permission)
                                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">{{ $permission }}</span>
                                        @endforeach
                                    </h5>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-button class="normal-case" px="3" py="1" color="indigo" href="{{ route('roles.edit',$role) }}">
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
