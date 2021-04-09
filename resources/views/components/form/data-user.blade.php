@isset($user)
    <div>
        <div class="flex items-center space-x-5">
            <div class="flex-shrink-0">
                <div class="relative">
                    <img class="h-16 w-16 rounded-full" src="{{ $user->pegawai->avatar_url }}" alt="">
                    <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $user->pegawai->nama }}</h1>
                <p class="text-sm font-medium text-gray-500">{{ $user->pegawai->nip }}</p>
                <p class="text-sm font-medium text-gray-500">Sebagai {{ $user->roles()->first() ? $user->roles()->first()->name : "" }} di {{ $user->pegawai->unit->nama }}</p>
            </div>
        </div>
    </div>
@endisset