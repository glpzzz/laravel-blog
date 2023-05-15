<x-layout>
    <article>
        <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
        {!! $post->body!!}
    </article>
    <nav>
        <ul>
            <li><a href="/posts">Go Back</a></li>
        </ul>
    </nav>
</x-layout>
