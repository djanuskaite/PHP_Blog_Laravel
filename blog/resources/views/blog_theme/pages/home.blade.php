{{--nurodom kelia iki main--}}
@extends('blog_theme/main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h6 class="post-category">
                            Category: {{$post->category_name}}
                        </h6>
                        <p class="post-content font-italic">
                            {{ Str::limit($post->body, 250) }}
{{--                          {{ substr($post->body,0, 250) }}--}}
                        </p>
                        <div>
                            <img src="{{asset($post->img)}}"}>
                        </div>
                        <p>Posted by: {{$post->name}}</p>
                    </a>
                    <a href="post/{{$post->id}}" class="text-info bg-warning rounded p-2 mb-5">Read More</a>

                        <div class="mt-4"><a href="/edit/{{$post->id}}"><i class="fas fa-pencil-alt"> Edit</i></a></div>
                        <a onclick="return confirm('Are You Sure You Want to Delete Thatvagra Post?')" href="/delete/{{$post->id}}"><i class="fas fa-trash-alt"> Delete</i></a>

                </div>
        @endforeach

        <!-- Pager -->
            <div class="clearfix mt-5">
                {{ $posts->links() }}
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
@endsection
