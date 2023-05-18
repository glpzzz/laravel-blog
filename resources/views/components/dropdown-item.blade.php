@props(['active' => false])

@php
    $classes= ($active ? 'bg-blue-500 text-white ' : '' ) . 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white';
@endphp

<li>
    <a {{ $attributes(['class' => $classes]) }} >{{ $slot }}</a>
</li>
