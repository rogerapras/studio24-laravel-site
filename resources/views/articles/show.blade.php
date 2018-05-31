@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/comments.css">
@endsection

@section('meta_description', $article->meta_description)
@section('meta_keywords', $article->meta_keywords)
@section('title') @parent - {{ $article->title }}@endsection

@section('content')
    <section class="well1">
        <div class="container">
            <h2>{{ $article->title }}</h2>
            <hr>
            <p>{!! $article->body !!}</p>
            <hr>
        </div>
        <div class="container">
            <h2 style="display: inline">@lang('messages.comments')</h2><sup>{{ $article->comments->count() }}</sup>
            @if(! Auth::check())
                <p>@lang('messages.comments_login_title')</p>
                <div class="social-bottom github">
                    <a href="/login/github"><i class="fa fa-github fa-2x"></i></a>
                </div>
                <div class="social-bottom google-pluse">
                    <a href="/login/google"><i class="fa fa-google-plus fa-2x"></i></a>
                </div>
                <div class="social-bottom twitter">
                    <a href="/login/twitter"><i class="fa fa-twitter fa-2x"></i></a>
                </div>
                <div class="social-bottom facebook">
                    <a href="/login/facebook"><i class="fa fa-facebook fa-2x"></i></a>
                </div>
                <hr>
            @else
                @include('layouts.errors')
                <div class="comment-wrap">
                    <div class="photo">
                        <div class="avatar"
                             style="background-image: url('{{ Auth::user()->avatar }}')"></div>
                    </div>
                    <div class="comment-block">
                        <form action="/articles/{{ $article->id }}/comments" method="post">
                            {{ csrf_field() }}
                            <textarea name="comment_body" id="body" cols="30" rows="3"
                                      placeholder="@lang('messages.comments_form_placeholder')..."></textarea>
                            {!! NoCaptcha::display() !!}
                            <input type="submit" class="comment-button" value="@lang('messages.form_add_button')">
                        </form>
                    </div>
                </div>
            @endif
            @if($article->comments->count() > 0)
                @foreach($article->comments as $comment)
                    <div class="comment-wrap">
                        <div class="photo">
                            <div class="avatar"
                                 style="background-image: url('{{ $comment->user->avatar }}')"></div>
                        </div>
                        <div class="comment-block">
                            <div class="comment-user">
                                <strong>{{ $comment->user->name }}</strong>
                            </div>
                            <p class="comment-text">{{ $comment->body }}</p>
                            <div class="bottom-comment">
                                @php Carbon::setLocale('ru') @endphp
                                <div class="comment-date">{{ $comment->created_at->diffForHumans() }}</div>
                            </div>
                            <hr>
                        </div>
                    </div>
                @endforeach
            @else
                <span>@lang('messages.comments_has_not_yet')</span>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    {!! NoCaptcha::renderJs() !!}
@endsection
