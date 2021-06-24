<h5>
    @php 
        $permissions = explode(',', $value);
    @endphp
    @foreach ($permissions as $permission)
        <x-badge class="mr-1 mb-1">{{ $permission }}</x-badge>
    @endforeach
</h5>