@extends('blog_theme/main')
@section('content')
    @foreach($selectedCategory as $post)
        <div class="post-preview">
            <h2 class="post-title mb-0 pb-0">{{$post->title}}</h2>
            <p class="post-category pt-0 mt-0 text-secondary">{{$post->category}}</p>
            <h3 class="post-body font-weight-normal mb-4">{{ substr($post->body, 0,  100) }}...</h3> <!--piramame psl matyti teksta iki 250 simboliu-->
            <a href="post/{{$post->id}}" class="text-info bg-warning rounded p-2 mb-5">Read more</a>
        </div>
        <hr>
    @endforeach

@endsection
