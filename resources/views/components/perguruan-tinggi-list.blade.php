<ul class="dropdownList absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md border border-gray-300 bg-gray-100 py-1 text-base shadow-lg sm:text-sm hidden"
    role="listbox">
    @foreach ($daftar as $pt)
        <li class="cursor-pointer select-none py-2 px-3 hover:bg-gray-200 mobile-ellipsis" 
            role="option" 
            tabindex="0"
            data-id="{{ $pt['id'] }}"
            title="{{ $pt['label'] }}">
            {{ $pt['label'] }}
        </li>
    @endforeach
</ul>