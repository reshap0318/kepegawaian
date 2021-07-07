<div>
    <div class="ml-3 relative" x-data="{ openNotif: false }" @click.away="openNotif = false" @close.stop="openNotif = false">
        <div>
          <button class="py-2 px-1 max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none" id="user-notif" aria-expanded="false" aria-haspopup="true" @click="openNotif = ! openNotif">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="absolute inset-0 object-right-top -mr-6">
                @if ($totalNotify>0)
                    <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white" >
                        {{ $totalNotify }}
                    </div>
                @endif
            </span>
          </button>
        </div>
        <div class="origin-top-right absolute right-0 mt-2 w-80 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none border" role="menu" aria-orientation="vertical" aria-labelledby="user-notif" x-show="openNotif"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95" style="display: none;">
            <div class="overflow-y-auto h-full py-2">
                @forelse ($notifys as $notify)
                    <a href="#" class="flex items-center px-4 py-3 border-b {{ $notify->read_at ? "" : "bg-gray-200" }}" wire:click="markRead('{{ $notify->id }}', '{{ $notify->data['user_id'] }}')">
                        <p class="text-gray-600 text-sm mx-2">
                            {{ $notify->data['pesan'] }}, {{ $notify->created_at->diffForHumans() }}
                        </p>
                    </a>
                @empty
                    <a href="#" class="flex items-center px-4 py-3">
                        <p class="text-gray-600 text-sm mx-2">
                            Tidak Ada Notifikasi.
                        </p>
                    </a>
                @endforelse
            </div>
            {{-- <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">See all notifications</a> --}}
        </div>
    </div>
</div>
