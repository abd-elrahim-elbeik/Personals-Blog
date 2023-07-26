<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->get();
        // dd($articles);

        return view('dashboard.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('dashboard.articles.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'tags' => 'required|min:1',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = Auth::id();
        $article->category_id = $request->category_id;


        if($request->image){
            Image::make($request->image)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $request->image->hashName()));

            $article->image = $request->image->hashName();

        }

        $article->save();

        $article->tags()->attach($request->tags);

        session()->flash('success','add don!');


        return redirect()->route('articles.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.articles.edit',compact('article','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'tags' => 'required|min:1',
        ]);

        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        $article->tags()->sync($request->tags);


        session()->flash('success','Update don!');
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Request $request)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        session()->flash('success','Delete don!');
        return redirect()->route('articles.index');
    }
}
