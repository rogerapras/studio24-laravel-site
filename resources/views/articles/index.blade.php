@extends('layouts.master')
@section('title')
    @parent
    - @lang('messages.articles_page_title')
@endsection
@section('content')
    <main>
        <section class="well1 ins2 mobile-center">
            <div class="container hr">
                <h2>@lang('messages.articles_page_title')</h2>
                @foreach($articles->chunk(3) as $chunk)
                    <div class="row off-2">
                        @foreach($chunk as $article)
                            <div class="grid_4"><img src="{{ Storage::url($article->preview_img) }}"
                                                     style="height: 217px; width:370px;">
                                <h3>{{ $article->title }}</h3>
                                <p>{{ $article->preview_text }}</p>
                                <a href="/articles/{{ $article->id }}"
                                   class="btn">@lang('messages.articles_page_read_button')</a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
