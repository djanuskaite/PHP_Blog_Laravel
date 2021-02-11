<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('blog_theme.pages.add-category');
    }

    public function categor(Request $request){
        $validatedData = $request->validate([
            'category' => 'required'
        ]);

        Category::create([
            'category_name' => request('category')
        ]);

        return redirect('/all-categories'); // nurodom kur jam grizti i pradini psl)
    }

    public function showCat(Category $category){
        $category = Category::all();
        return view('blog_theme/pages/all-categories', compact('category')); // paimk visas kategorijas is lenteles
    }

    public function deleteCat(Category $category){

        $category->delete();

        return redirect('/all-categories');
    }

    public function showPostsByCategory(Category $category){
        $selectedCategory = DB::table('posts')
            ->join('categories', 'categories.id', '=','posts.category')
            ->select('*')
            ->where('categories.id', $category->id)
            ->paginate(5);

        return view('blog_theme.pages.show-by-category', compact('selectedCategory'));
    }


}
