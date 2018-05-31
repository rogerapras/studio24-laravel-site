@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="/css/mailform.css">
@endsection
@section('title') @parent - @lang('messages.reviews') @endsection
@section('content')
    <main>
        <section class="well ins5">
            <div class="container">
                <h2>@lang('messages.reviews')</h2>

                @foreach($reviews as $review)
                    <h3 class="off3 primary" id="{{ $review->id }}">{{ $review->user->name }}</h3>
                    <p>{{ $review->body }}</p>
                    <hr>
                @endforeach

            </div>
        </section>
        <section class="well1">
            <div class="container">
                <h2>@lang('messages.feedback')</h2>
                @if(! Auth::check())
                    <p>@lang('messages.reviews_login_title')</p>
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

                    <form method="post" action="/reviews" class="mailform off2">
                        @include('layouts.errors')
                        {{ csrf_field() }}
                        <fieldset class="row">
                            <label class="grid_12">
                                <textarea name="review_body"></textarea>
                            </label>

                            <div class="mfControls grid_12">
                                {!! NoCaptcha::display() !!}
                                <button type="submit" class="btn">@lang('messages.form_add_button')</button>
                            </div>
                        </fieldset>
                    </form>
                @endif
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    @parent
    {!! NoCaptcha::renderJs() !!}
@endsection
