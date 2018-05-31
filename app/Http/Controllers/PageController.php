<?php

namespace App\Http\Controllers;

use App\Page;
use App\Review;
use App\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($url = '/')
    {
        if ($url === '/') {

            return view('index', [
                'page' => Page::all()->firstWhere('url', $url),
                'about' => Page::all()->firstWhere('url', 'about'),
                'services' => Service::all()->take(5),
                'reviews' => Review::all()->take(3),
            ]);

        }

        return view('pages.'.$url, ['page' => Page::all()->firstWhere('url', $url)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Page $page)
    {
        return view('pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|min:255',
        ]);

        $page->update($request->all());

        return back();
    }
}
