
<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col h-0 flex-1">
            <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
            </div>
            <div class="flex-1 flex flex-col overflow-y-auto">
                <nav class="flex-1 px-2 py-4 bg-gray-800 space-y-1">
                    <x-menu.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" >
                        <svg class="text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </x-menu.nav-link>
                    <x-menu.dropdown :active="request()->routeIs('units.index') || request()->routeIs('fungsionals.index')"  x-show="{{ Auth::user()->hasAnyPermission(['units_access', 'fungsionals_access','pangkat-golongans_access','jabatan-units_access']) ? 'true' : 'false' }}" style="display: none">
                        <x-slot name="trigger"> 
                            <svg class="text-gray-400 group-hover:text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                            Master
                        </x-slot>
                        <x-menu.nav-link :href="route('units.index')" :active="request()->routeIs('units.index')" x-show="{{ Auth::user()->can('units_access') ? 'true' : 'false' }}" dropdown="true">
                            Unit
                        </x-menu.nav-link>
                        <x-menu.nav-link :href="route('fungsionals.index')" :active="request()->routeIs('fungsionals.index')" x-show="{{ Auth::user()->can('fungsionals_access') ? 'true' : 'false' }}" dropdown="true">
                            Fungsional
                        </x-menu.nav-link>
                        <x-menu.nav-link :href="route('pangkatGolongans.index')" :active="request()->routeIs('pangkatGolongans.index')" x-show="{{ Auth::user()->can('pangkat-golongans_access') ? 'true' : 'false' }}" dropdown="true">
                            Pangkat Golongan
                        </x-menu.nav-link>
                        <x-menu.nav-link :href="route('jabatanUnits.index')" :active="request()->routeIs('jabatanUnits.index')" x-show="{{ Auth::user()->can('jabatan-units_access') ? 'true' : 'false' }}" dropdown="true">
                            jabatan Unit
                        </x-menu.nav-link>
                    </x-menu.dropdown>

                    <x-menu.dropdown :active="request()->routeIs('roles.index') || request()->routeIs('permissions.index') || request()->routeIs('api-akses_access')" x-show="{{ Auth::user()->hasAnyPermission(['roles_access','api-akses_access']) ? 'true' : 'false' }}"  style="display: none">
                        <x-slot name="trigger"> 
                            <svg class="text-gray-400 group-hover:text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Autorization
                        </x-slot>
                        <x-menu.nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')" dropdown="true" x-show="{{ Auth::user()->can('roles_access') ? 'true' : 'false' }}">
                            Role
                        </x-menu.nav-link>
                        <x-menu.nav-link href="{{ route('permissions.index') }}" :active="request()->routeIs('permissions.index')" dropdown="true" x-show="{{ Auth::user()->can('roles_access') ? 'true' : 'false' }}">
                            Permission
                        </x-menu.nav-link>
                        <x-menu.nav-link href="{{ route('apiAksess.index') }}" :active="request()->routeIs('apiAksess.index')" dropdown="true" x-show="{{ Auth::user()->can('api-akses_access') ? 'true' : 'false' }}">
                            Api Akses
                        </x-menu.nav-link>
                    </x-menu.dropdown>
                    <x-menu.nav-link :href="route('pegawai.index')" :active="request()->routeIs('pegawai.index')" x-show="{{ Auth::user()->can('pegawai_access') ? 'true' : 'false' }}"  style="display: none">
                        <svg class="text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>
                        Pegawai
                    </x-menu.nav-link>
                    <x-menu.nav-link :href="route('frontend.pegawai.index')" :active="request()->routeIs('frontend.pegawai.index')" x-show="{{ Auth::user()->can('pegawai') ? 'true' : 'false' }}"  style="display: none">
                        <svg class="text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Data Diri
                    </x-menu.nav-link>
                </nav>
            </div>
        </div>
    </div>
</div>