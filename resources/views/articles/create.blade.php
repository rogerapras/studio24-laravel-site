@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="/vendor/ContactFrom_v7/css/main.css">
    <link rel="stylesheet" href="/vendor/ContactFrom_v7/css/util.css">
@endsection
@section('content')
    <main>
        <section class="well2">
            <div class="container">
                <div class="container-contact100">
                    <div class="wrap-contact100">
                        <form action="/articles" method="post" class="contact100-form validate-form"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <span class="contact100-form-title">@lang('messages.form_add_article')</span>

                            @include('layouts.errors')

                            <div class="wrap-input100 validate-input"
                                 data-validate="@lang('messages.form_required_field')">
                                <input class="input100" id="title" type="text" name="title"
                                       placeholder="@lang('messages.form_article_title')">
                                <label class="label-input100" for="title">
                                    <span class="lnr lnr-user"></span>
                                </label>
                            </div>

                            <div class="wrap-input100 validate-input"
                                 data-validate="@lang('messages.form_required_field')">
                                <input class="input100" id="preview_text" type="text" name="preview_text"
                                       placeholder="@lang('messages.form_article_preview')">
                                <label class="label-input100" for="preview_text">
                                    <span class="lnr lnr-user"></span>
                                </label>
                            </div>

                            <div class="wrap-input100">
                                <input class="input100" id="meta_description" type="text" name="meta_description"
                                       placeholder="@lang('messages.form_meta_description')">
                                <label class="label-input100" for="meta_description">
                                    <span class="lnr lnr-user"></span>
                                </label>
                            </div>

                            <div class="wrap-input100">
                                <input class="input100" id="meta_keywords" type="text" name="meta_keywords"
                                       placeholder="@lang('messages.form_meta_keywords')">
                                <label class="label-input100" for="meta_keywords">
                                    <span class="lnr lnr-user"></span>
                                </label>
                            </div>

                            <p>@lang('messages.form_article_image')</p>
                            <input class="" id="preview_img" type="file" name="preview_img">

                            <div class="wrap-input100 validate-input"
                                 data-validate="@lang('messages.form_required_field')">
                                <textarea class="input100" id="body" name="body"></textarea>
                                <label class="label-input100" for="body">
                                    <span class="lnr lnr-user"></span>
                                </label>
                            </div>

                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" value="1" id="activity" type="checkbox"
                                       name="activity">
                                <label class="label-checkbox100" for="activity">
                                    @lang('messages.form_article_publish')
                                </label>
                            </div>

                            <button type="submit" class="btn ">
                                <span class="">@lang('messages.form_add_button')</span>
                                <span class="loader"></span><span class="msg"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script src='/vendor/ContactFrom_v7/js/main.js'></script>
    <script src='/vendor/unisharp/laravel-ckeditor/ckeditor.js'></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('body', options);
    </script>
@endsection
