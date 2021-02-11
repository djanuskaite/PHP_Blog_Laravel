@extends('blog_theme/main')

@section('content')


    <div class="row justify-content-center mb-5">
        <h2 class="text-secondary">Add new post</h2>
    </div>


    @include('blog_theme/_partials/errors')
    <form action="/store" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Name of a title" name="title">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
                <option name="category" value="" disabled selected>Choose a category</option>
                @foreach($options as $option)
                    <option value={{$option->id}}>{{$option->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Your post:</label>
            <textarea class="form-control" id="content" rows="5" name="body"></textarea>
        </div>
        <div class="form-group">
            <label for="upload">Choose a picture:</label>
            <input type="file" class="form-control" id="upload"  name="picture">
        </div>
        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" class="btn btn-warning rounded" name="post">Post</button>
        </div>
    </form>

@endsection
