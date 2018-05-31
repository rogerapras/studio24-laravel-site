@extends('layouts.master')

@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('title') @parent - {{ $page->title }}@endsection

@section('content')
    <main>
        <section class="well1">
            <div class="container">
                <h2>{{ $page->title }}</h2>
                @if(Auth::check() && Auth::user()->isAdmin())
                    <p><a href="/pages/edit/{{ $page->id }}"><i class="fa fa-pencil-square-o"></i></a></p>
                @endif
                {{ $page->content }}
            </div>
        </section>
    </main>
@endsection
