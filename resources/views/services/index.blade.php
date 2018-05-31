@extends('layouts.master')

@section('title')
    @parent - @lang('messages.service_page_title')
@endsection

@section('content')
    <main>
        <section class="well1 ins4 bg-image">
            <div class="container">
                <div class="row">
                    <div class="grid_7 preffix_5">
                        <h2>@lang('messages.service_page_title')</h2>
                        <p>@lang('messages.service_page_description')</p>
                        <div class="row off4">
                            @foreach($services->chunk(3) as $chunk)
                                <div class="grid_3">
                                    <ul class="marked-list wow fadeInRight">
                                        @foreach($chunk as $service)
                                            <li><a href="/services/{{ $service->id }}">{{ $service->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
