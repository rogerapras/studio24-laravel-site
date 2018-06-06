<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    /**
     * Where to redirect.
     *
     * @var string
     */
    protected $redirectTo = 'articles';

    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['index', 'show', 'displayPreviewImage']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.index', ['articles' => Article::active()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'preview_text' => 'required|max:512',
            'body' => 'required',
        ]);

        if ($request->hasFile('preview_img')) {
            $path = $request->file('preview_img')->store('public/article_previews');

            $request->merge(['preview_img' => $path]);
        }

        $request->merge(['user_id' => auth()->id()]);

        Article::create($request->all());

        return redirect($this->redirectTo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'preview_text' => 'required|max:512',
            'body' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/article_previews');

            $request->merge(['preview_img' => $path]);
        }

        $article->update($request->all());

        return redirect($this->redirectTo);
    }

    /**
     * Remove the specified resource in storage.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect($this->redirectTo);
    }

    /**
     * Return image from Storage path
     *
     * @param $filename
     * @return mixed
     */
    public function displayPreviewImage($filename)
    {
        return Image::make(storage_path().'/app/public/article_previews/'.$filename)->response();
    }
}
