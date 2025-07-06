@props(['active' => false, 'type' => 'a'])

<!-- Ver 1: Basic URL & Text substitution using Slots. Assuming PageName=FileName
    <a href="/{{ strtolower($slot) }}">{{ $slot }}</a> 
-->

<!-- Ver 2: replaced with tailwind UI based navlink. Still assuming that Page name = file name
    <a href="/{{ strtolower($slot) }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">{{ $slot }}</a>
-->

<!-- Ver 3: Using 'request()' to check path for conditional application of formatting. Still assuming PageName=FileName
<a href="/{{ strtolower($slot) }}" class="{{ request()->is(strtolower($slot)) ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ request()->is(strtolower($slot)) ? 'page': 'false' }}">
    {{ $slot }}
</a>
-->

<!-- Ver 4: Using Props for extra control. This now requires URL to be set in Layout and is no longer as dynamic. -->
<a class="{{ $active ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
    aria-current="{{ $active ? 'page': 'false' }}" 
    {{ $attributes }}>
    {{ $slot }}
</a>


<!-- Ver 5: Homework on P5 requiring using 'type' prop for Anchor vs Button. Buttons non functional.
@if($type == 'a')
    <a class="{{ $active ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
            aria-current="{{ $active ? 'page': 'false' }}" 
            {{ $attributes }}>
            {{ $slot }}
    </a>
@else
    <button class="{{ $active ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
            aria-current="{{ $active ? 'page': 'false' }}" 
            {{ $attributes }}>
            {{ $slot }}
    </button>
@endif
-->