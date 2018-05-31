<!--
    ========================================================
                                FOOTER
    ========================================================
    -->
<footer>
    <section class="well3">
        <div class="container">
            <ul class="row contact-list">
                <li class="grid_4">
                    <div class="box">
                        <div class="box_aside">
                            <div class="icon2 fa-envelope"></div>
                        </div>
                        <div class="box_cnt__no-flow"><a href="mailto:{{__('messages.email')}}">@lang('messages.email')</a></div>
                    </div>
                </li>
                <li class="grid_4">
                    <div class="box">
                        <div class="box_aside">
                            <div class="icon2 fa-phone"></div>
                        </div>
                        <div class="box_cnt__no-flow"><a
                                    href="callto:{{__('messages.phone_call')}}">@lang('messages.phone')</a></div>
                    </div>
                </li>
                <li class="grid_4">
                    <div class="box">
                        <div class="box_aside">
                            <div class="icon2 fa-vk"></div>
                        </div>
                        <div class="box_cnt__no-flow"><a
                                    href="https://vk.com/studia_24">@lang('messages.our_group_vk')</a></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="copyright">@lang('messages.company_name') © <span
                        id="copyright-year">{{ Carbon::now()->year }}</span>.&nbsp;&nbsp;<a>@lang('messages.rights')</a>
            </div>
        </div>
    </section>
</footer>
