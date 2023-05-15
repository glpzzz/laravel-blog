<x-layout>
    <header>
        <h1>Latest news</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consectetur consequatur ducimus eaque, eius eligendi
            eveniet facere ipsa iste laborum maiores molestias non possimus quos rerum sunt suscipit ullam voluptas!</p>
        <hr>
    </header>
    @foreach($posts as $post)
        <article>
            <h2><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h2>
            <p>{!! $post->excerpt !!}</p>
            <p>
                <small>On <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></small>
            </p>
        </article>
    @endforeach
</x-layout>
