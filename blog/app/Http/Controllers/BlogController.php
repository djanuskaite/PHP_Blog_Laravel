<?php


namespace App\Http\Controllers;

use App\Category;
use Gate;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
 * CRUD
 */
class BlogController extends Controller
{
    // nurodom kad metodai pasiekiami tik prisijungusiam vartotojui, bet isvardinam isimtis
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'showFull']]);
    }

    public function index()

    {
        $posts = DB::table('posts')
            ->join('categories', 'posts.category', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.body', 'categories.category_name', 'users.name') //categories.category_name
            ->paginate(5);

        return view('blog_theme.pages.home', compact('posts'));
    }

    public function addPost()
    {
        $options = Category::all();

        return view('blog_theme.pages.add-post', compact('options'));
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
            'body' => request('body'),
            'user_id' => Auth::id()
        ]);

        return redirect('/'); // nurodom kur jam grizti i pradini psl)

    }

    public function showFull(Post $post){
        return view('blog_theme/pages/posts', compact('post'));
    }

    public function edit(Post $post)
    {

        if (Gate::allows('update', $post)) {
            $options = Category::all(); // options ateina is kategoriju lenteles postai is postu
            return view('blog_theme.pages.edit', compact('options', 'post'));
        }
        dd('klaida');
    }

    public function storeUpdate(Request $request, Post $post)
    {
        Post::where('id',$post->id)->update($request->only(['title','category','body']));
        return redirect('/post/'.$post->id);
    }

    public function delete(Post $post)
    {

        if (Gate::allows('update', $post)) {
            $post->delete();

            return redirect('/');
        }
        dd('klaida klaiduze');
    }

}
