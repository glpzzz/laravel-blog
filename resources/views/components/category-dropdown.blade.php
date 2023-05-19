<x-dropdown x-data="{ show: false }" @click.away="show = false">
    <x-slot name="trigger">
        {{ !isset($currentCategory) ? 'Categories' : $currentCategory->name }}
        <x-icon name="down-arrow" class="absolute  pointer-events-none"/>
    </x-slot>
    <ul x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50"
        style="display: none">
        <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}">All</x-dropdown-item>
        @foreach($categories as $category)
            <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                             :active="isset($currentCategory) && $currentCategory->is($category)">
                {{$category->name}}
            </x-dropdown-item>
        @endforeach
    </ul>
</x-dropdown>
