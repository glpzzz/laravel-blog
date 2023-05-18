<x-layout>
    <section>
        <h2><a href="/users/{{$user->name}}">{{$user->name}}</a></h2>
        @foreach($user->posts as $post)
            <x-post :post="$post"></x-post>
        @endforeach
    </section>
    <hr>
    <nav>
        <ul>
            <li><a href="/posts">Go Back</a></li>
        </ul>
    </nav>
</x-layout>
