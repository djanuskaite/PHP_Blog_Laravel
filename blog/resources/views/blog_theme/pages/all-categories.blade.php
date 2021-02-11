@extends('blog_theme/main')

@section('content')

    <div class="row justify-content-center mb-5">
        <h2 class="text-secondary">All categories</h2>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Category</th>
            <th scope="col"><i class="fas fa-minus-circle"></i></th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $categories)
            <tr>
                <td><a href="/category/{{$categories->id}}">{{$categories->category_name}}</a></td>
{{--                <td>{{ $categories->category }}</td>--}}
                <td><a href="/delete/category/{{$categories->id}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
