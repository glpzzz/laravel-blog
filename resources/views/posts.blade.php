<x-layout>
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            @if(!isset($category))
                Latest <span class="text-blue-500">Laravel From Scratch</span> News
            @else
                {{ $category->name }}
            @endif
        </h1>

        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
            <!--  Category -->
            <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
                <x-dropdown>
                    <x-slot name="trigger">
                        {{ !isset($category) ? 'Categories' : $category->name }}
                        <x-icon name="down-arrow" class="absolute  pointer-events-none"/>
                    </x-slot>
                    <ul x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50"
                        style="display: none">
                        <x-dropdown-item href="/posts">All</x-dropdown-item>
                        @foreach($categories as $c)
                            <x-dropdown-item href="/categories/{{ $c->slug }}"
                                             :active="isset($category) && $category->is($c)">
                                {{$c->name}}
                            </x-dropdown-item>
                        @endforeach
                    </ul>
                </x-dropdown>
            </div>

            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="#">
                    <input type="text" name="search" placeholder="Find something"
                           class="bg-transparent placeholder-black font-semibold text-sm" value="{{ request('search') }}">
                </form>
            </div>
        </div>
    </header>
    <x-list-posts :posts="$posts"/>
</x-layout>
