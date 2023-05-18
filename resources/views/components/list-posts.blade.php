@props(['posts'])

@if($posts->count())
    <x-card-post :post="$posts[0]" :featured="true"/>
    @if($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-6">
            @foreach($posts->skip(1) as $post)
                <x-card-post :post="$post" :class="$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'"/>
            @endforeach
        </div>
    @endif
@else
    <p class="text-center">No posts yet. Please, come back later.</p>
@endif
