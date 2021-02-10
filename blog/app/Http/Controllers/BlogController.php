<?php


namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;


/*
 * CRUD
 */
class BlogController extends Controller
{
    public function index()

    {
        $posts = DB::table('posts')
            ->join('categories', 'posts.category', '=', 'categories.id')
            ->select('posts.id', 'posts.title', 'posts.body', 'categories.category', 'categories.id')
            ->paginate(5);

        return view('blog_theme.pages.home', compact('posts'));
    }

    public function addPost()
    {
        $options = Category::all();

        return view('blog_theme.pages.add-post', compact('options'));
    }

    public function edit(Post $post)
    {
        $options = Category::all(); // options ateina is kategoriju lenteles postai is postu

        return view('blog_theme.pages.edit', compact('options', 'post'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'category' => 'required'
        ]);

        Post::create([
            'title' => request('title'),
            'category' => request('category'),
            'body' => request('body')
        ]);

        return redirect('/'); // nurodom kur jam grizti i pradini psl)

    }

    public function showFull(Post $post){
        return view('blog_theme/pages/posts', compact('post'));
    }


    public function storeUpdate(Request $request, Post $post)
    {
        Post::where('id',$post->id)->update($request->only(['title','category','body']));
        return redirect('/post/'.$post->id);
    }

    public function delete(Post $post){

        $post->delete();

        return redirect('/');
    }

}
