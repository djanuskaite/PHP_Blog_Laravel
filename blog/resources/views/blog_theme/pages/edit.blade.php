@extends('blog_theme/main')

@section('content')

    <div class="row justify-content-center mb-5">
        <h2 class="text-secondary">Edit</h2>
    </div>

    @include('blog_theme/_partials/errors')
    <form action="/storeupdate/{{$post->id}}" method="post">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$post->title}}" class="form-control" id="title" placeholder="Name of a title" name="title">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
{{--                <option>{{$post->category}}</option>--}}
                @foreach($options as $option)
                    @if($option->id == $post->category_id)
                    <option value="{{$option->id}}" selected>{{$option->category_name}}</option>
                    @endif
                        @if($option->id != $post->category_id)
                            <option value="{{$option->id}}">{{$option->category_name}}</option>
                        @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Your post:</label>
            <textarea class="form-control" id="content" rows="5" name="body">{{$post->body}}</textarea>
        </div>
        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" class="btn btn-warning rounded" name="post">Save</button>
        </div>
    </form>

@endsection
