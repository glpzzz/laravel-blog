<x-layout>
    <section>
        <h2><a href="/categories/{{$category->slug}}">{{$category->name}}</a></h2>
        <ul>
            @foreach($category->posts as $post)
                <li>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                </li>
            @endforeach
        </ul>
    </section>
    <hr>
    <nav>
        <ul>
            <li><a href="/categories">Go Back</a></li>
        </ul>
    </nav>
</x-layout>
