@extends('layouts.master')
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('content')
    <main>
        <section class="camera_container">
            <div id="camera" class="camera_wrap">
                <div data-src="images/slider-1.jpg">
                    <div class="camera_caption fadeIn">
                        <div class="container">
                            <div class="row">
                                {{--<div class="preffix_6 grid_6">Восстановление данных</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div data-src="images/slider-2.jpg">
                    <div class="camera_caption fadeIn">
                        <div class="container">
                            <div class="row">
                                {{--<div class="preffix_6 grid_6">The best strategies to attract new business</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div data-src="images/slider-3.jpg">
                    <div class="camera_caption fadeIn">
                        <div class="container">
                            <div class="row">
                                {{--<div class="preffix_6 grid_6">A wide range of global business information</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="well ins1">
            <div class="container hr">
                <ul class="row product-list">
                    <li class="grid_6">
                        <div class="box wow fadeInRight">
                            <div class="box_aside">
                                <div class="icon fa-clock-o"></div>
                            </div>
                            <div class="box_cnt__no-flow">
                                <h3>Пунктуальность</h3>
                                <p>Всегда приезжаю вовремя. </p>
                            </div>
                        </div>
                        <hr>
                        <div data-wow-delay="0.2s" class="box wow fadeInRight">
                            <div class="box_aside">
                                <div class="icon fa-desktop"></div>
                            </div>
                            <div class="box_cnt__no-flow">
                                <h3>Актуальное ПО</h3>
                                <p>Мы устанавливаем только самые последние версии программного обеспечения. </p>
                            </div>
                        </div>
                    </li>
                    <li class="grid_6">
                        <div data-wow-delay="0.3s" class="box wow fadeInRight">
                            <div class="box_aside">
                                <div class="icon fa-briefcase"></div>
                            </div>
                            <div class="box_cnt__no-flow">
                                <h3>Порядочность</h3>
                                <p>Бережное отношение к технике, конфиденциальность для вашей информации. </p>
                            </div>
                        </div>
                        <hr>
                        <div data-wow-delay="0.4s" class="box wow fadeInRight">
                            <div class="box_aside">
                                <div class="icon fa-tasks"></div>
                            </div>
                            <div class="box_cnt__no-flow">
                                <h3>Любые задачи</h3>
                                <p>Мы выполняем ремонтные работы любой сложности. Нас не пугают невыполнимые
                                    задачи. </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="well1">
            <div class="container">
                <div class="row">
                    <div class="grid_4">
                        <h2>@lang('messages.about_us_page_title')</h2><img src="images/page-1_img01.jpg" alt="">
                        <p>{!! str_limit($about->content, 299) !!}</p><a
                                href="/pages/about" class="btn">@lang('messages.read_more')</a>
                    </div>
                    <div class="grid_4">
                        <h2>@lang('messages.service_page_title')</h2>
                        <p>{!! str_limit(__('messages.service_page_description'), 220, '...' ) !!}</p>
                        <ul class="marked-list">
                            @foreach($services as $service)
                                <li><a href="/service/{{ $service->id }}">{{ $service->name }}</a></li>
                            @endforeach
                        </ul>
                        <a href="/services" class="btn">@lang('messages.read_more')</a>
                    </div>
                    <div class="grid_4">
                        <div class="info-box">
                            <h2 class="fa-comment">Связаться</h2>
                            <hr>
                            <h3>График:</h3>
                            <dl>
                                <dt>Понедельник - Пятница:</dt>
                                <dd>9:00-19:00</dd>
                            </dl>
                            <dl>
                                <dt>Суббота:</dt>
                                <dd>9:00-15:00</dd>
                            </dl>
                            <dl>
                                <dt>Воскресенье:</dt>
                                <dd>выходной</dd>
                            </dl>
                            <hr>
                            <h3>Выезд мастера бесплатно:</h3>
                            <dl>
                                <dt>@lang('messages.phone')</dt>
                            </dl>
                        </div>
                        <div class="owl-carousel">
                            @foreach($reviews as $review)
                                <div class="item">
                                    <blockquote class="box">
                                        <div class="box_aside">
                                            <img src="{{ $review->user->avatar }}" alt="{{ $review->user->name }}">
                                        </div>
                                        <div class="box_cnt__no-flow">
                                            <p>
                                                <strong>{{ $review->user->name }}:</strong><br>
                                                <q>{!! str_limit($review->body, 90, '...' ) !!}</q>
                                            </p>
                                            <cite><a href="/reviews/#{{ $review->id }}">@lang('messages.read_more')</a></cite>
                                        </div>
                                    </blockquote>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
