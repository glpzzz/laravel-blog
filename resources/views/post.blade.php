<x-layout>
    <article>
        <header>
            <h2><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h2>
            <p>By <a href="/users/{{$post->author->name}}">{{$post->author->name}}</a> on <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
        </header>
        {!! $post->body!!}
    </article>
    <hr>
    <nav>
        <ul>
            <li><a href="/posts">Go Back</a></li>
        </ul>
    </nav>
</x-layout>
