<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5); // nurodom kiek postu rodyt

        return view('blog_theme.pages.home', compact('posts'));
    }

    public function addPost()
    {
        $options = [
            'LIFESTYLE',
            'TRAVEL',
            'FOOD & DRINK',
            'BUSINESS',
            'REVIEWS'
        ];
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
            'body' => request('body')
        ]);

        return redirect('/'); // nurodom kur jam grizti i pradini psl)

    }
}
