<!-- replaced with tailwind UI based navlink. Still assuming that Page name = file name
    <a href="/{{ strtolower($slot) }}">{{ $slot }}</a> 
-->
<a href="/{{ strtolower($slot) }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">{{ $slot }}</a>