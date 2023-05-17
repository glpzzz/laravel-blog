<x-layout>
    <header>
        <h1>Latest news</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consectetur consequatur ducimus eaque, eius
            eligendi
            eveniet facere ipsa iste laborum maiores molestias non possimus quos rerum sunt suscipit ullam voluptas!</p>
        <hr>
    </header>
    @foreach($posts as $post)
        <article>
            <h2><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h2>
            <p>By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> on <a
                    href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>: {!! $post->excerpt !!}
            </p>
        </article>
    @endforeach
</x-layout>
