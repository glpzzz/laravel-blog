<x-layout>
    <header>
        <h1>Categories</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consectetur consequatur ducimus eaque, eius
            eligendi
            eveniet facere ipsa iste laborum maiores molestias non possimus quos rerum sunt suscipit ullam voluptas!</p>
        <hr>
    </header>
    <ul>
        @foreach($categories as $category)
            <li><a href="/categories/{{$category->slug}}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</x-layout>
