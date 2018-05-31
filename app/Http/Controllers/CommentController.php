<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * CommentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Article $article
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Article $article, Request $request)
    {
        $this->validate($request, [
            'comment_body' => 'required|min:2',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $article->addComment([
            'body' => request('comment_body'),
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
