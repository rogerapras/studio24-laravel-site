<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * ReviewController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('reviews.index', ['reviews' => Review::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'review_body' => 'required|min:2',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'body' => $request->get('review_body'),
        ]);

        return back();
    }
}
