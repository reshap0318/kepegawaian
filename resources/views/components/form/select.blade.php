<select {{ $attributes->merge(['class' => "mt-1 bg-white-600 text-white-400 appearance-none border-gray-300 focus:border-indigo-300 inline-block text-sm py-2.5 pl-3 pr-8 rounded leading-tight w-full"]) }} >
    {{ $slot }}
</select>
