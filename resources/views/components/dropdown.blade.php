<div x-data="{ show: false }" @click.away="show = false">
    <button @click="show = !show"
            class="py-2 pl-3 pr-9 text-sm text-left font-semibold w-full lg:w-32 flex lg:inline-flex">
        {{ $trigger }}
    </button>
    {{ $slot }}
</div>
