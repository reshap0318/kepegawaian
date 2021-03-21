@props(['active' => false])
@php
  $classes = "group w-full flex items-center px-2 py-2 text-sm font-medium rounded-md focus:outline-none "; 
  $classes = $active ? $classes."text-gray-300 hover:text-white " : $classes."text-gray-300 hover:text-white hover:bg-gray-700";
@endphp
<div class="space-y-1" x-data="dropdown()" >
    <button {{ $attributes->merge(['class' => $classes]) }} @click="open = ! open">
      {{ $trigger }}
      <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
      <svg class="ml-auto h-5 w-5 transform transition-colors ease-in-out duration-150" :class="[open ? 'group-hover:text-gray-400 rotate-90' : '']" viewBox="0 0 20 20" aria-hidden="true">
        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
      </svg>
    </button>
    <!-- Expandable link section, show/hide based on state. -->
    <div class="space-y-1" x-show="open" style="display: none;">
        {{ $slot }}
    </div>
</div>

<script>
  {{ json_encode($active) }}
  function dropdown() {
      return {
          open: false
      }
  }
</script>