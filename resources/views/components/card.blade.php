<div>
    {{ $btn ?? "" }}
    <div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow rounded-lg border border-gray-200']) }}>
        <div class="px-4 py-4 bg-white">
            {{ $slot }}
        </div>
    </div>
</div>

