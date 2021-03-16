<div class="mt-4">
    <x-slot name="title"> Pegawai </x-slot>
    <x-card>
        <x-slot name="btn"> 
            <div class="text-right pb-3">
                <x-button class="ml-3 normal-case" color="indigo" href="{{ route('pegawai.create') }}">
                    Tambah
                </x-button>
            </div>
        </x-slot>
        
    </x-card>
</div>
