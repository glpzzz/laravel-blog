<x-layout>
    <section>
        <h2><a href="/users/{{$user->name}}">{{$user->name}}</a></h2>
        <ul>
            @foreach($user->posts as $post)
                <li>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                </li>
            @endforeach
        </ul>
    </section>
    <hr>
    <nav>
        <ul>
            <li><a href="/posts">Go Back</a></li>
        </ul>
    </nav>
</x-layout>
