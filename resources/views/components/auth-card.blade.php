<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      {{ $logo ?? "" }}
    </div>
  
    <div class="mt-1 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-4 px-2 shadow sm:rounded-lg sm:px-10">
        {{ $slot }}
      </div>
    </div>
  </div>