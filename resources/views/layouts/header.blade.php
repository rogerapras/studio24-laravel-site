<!--
        ========================================================
                                    HEADER
        ========================================================

-->
<header>
    <div class="container">
        <div class="brand">
            <h1 class="brand_name"><a href="/">@lang('messages.company_name')</a></h1>
        </div>
        <a href="callto:{{__('messages.phone_call')}}" class="fa-phone">@lang('messages.phone')</a>
        <p>@lang('messages.slogan')</p>
    </div>
    <div id="stuck_container" class="stuck_container">
        <div class="container">
            <nav class="nav" style="float: left;">
                {!! Menu::get('topMenu')->asUl(['class' => 'sf-menu', 'data-type' => 'navbar']) !!}
            </nav>
            <nav class="nav" style="float: right;">
                <ul class="sf-menu" data-type="navbar">
                    @if(Auth::check())
                        <li><a href="{{ route('login') }}">{{ Auth::user()->name }}</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        @include('layouts.social')
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>
