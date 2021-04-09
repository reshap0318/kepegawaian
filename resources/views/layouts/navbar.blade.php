<div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
    <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="openMenu = true">
      <span class="sr-only">Open sidebar</span>
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
      </svg>
    </button>
    <div class="flex-1 px-4 flex justify-between">
      <div class="flex-1 flex">
        
      </div>
      <div class="ml-4 flex items-center md:ml-6">
        <button class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="sr-only">View notifications</span>
          <!-- Heroicon name: outline/bell -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <div class="ml-3 relative" @click.away="openUser = false" @close.stop="openUser = false">
          <div>
            <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu" aria-expanded="false" aria-haspopup="true" @click="openUser = ! openUser">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->pegawai->avatar_url }}" alt="">
            </button>
          </div>
          <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" x-show="openUser"
          x-transition:enter="transition ease-out duration-100"
          x-transition:enter-start="transform opacity-0 scale-95"
          x-transition:enter-end="transform opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75"
          x-transition:leave-start="transform opacity-100 scale-100"
          x-transition:leave-end="transform opacity-0 scale-95" style="display: none;">
            @can('pegawai')
              <a href="{{ route('frontend.pegawai.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Data Diri</a>
            @endcan

            <a href="{{ route('frontend.pegawai.password') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Ubah Password</a>

            {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a> --}}
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    <x-notification></x-notification>
    <x-notification-v1></x-notification-v1>
</div>