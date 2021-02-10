@extends('blog_theme/main')

@section('content')

    <div class="row justify-content-center mb-5">
        <h2 class="text-secondary">Add new category</h2>
    </div>

    <form action="/categor" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" id="title" placeholder="Name of a title" name="category">
        </div>
        <div class="text-center">
            <button type="submit" class="text-info bg-warning rounded mb-5 align-center">Submit</button>
        </div>

    </form>


@endsection
