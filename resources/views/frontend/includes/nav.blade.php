<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <a href="{{ route('frontend.index') }}" class="navbar-brand">{{ app_name() }}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @if(config('locale.status') && count(config('locale.languages')) > 1)
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">@lang('menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})</a>

                            @include('includes.partials.lang')
                        </li>

                    @endif

            @auth
                <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}">@lang('navs.frontend.dashboard')</a></li>
            @endauth

            @guest
                <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>

                @if(config('access.registration'))
                    <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        @can('view backend')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                        @endcan
                            <a href="{{ route('frontend.rdn') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.rdn')) }}">@lang('navs.frontend.rdn')</a>
                        <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                        <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Products</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        @can('view backend')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                        @endcan
                            <a href="{{ route('frontend.products') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.products')) }}">@lang('navs.frontend.products.inventory')</a>
                            <a href="{{ route('frontend.charting') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.charting')) }}">@lang('navs.frontend.products.charting')</a>
                            <a href="{{ route('frontend.inventory_updates') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.inventory_updates')) }}">@lang('navs.frontend.products.inventory_updates')</a>
                            <a href="{{ route('frontend.rdn') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.rdn')) }}">@lang('navs.frontend.rdn')</a>
                        <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                        <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                    </div>
                </li>

                            {{--<div class="collapse navbar-collapse " id="navbarSupportedContent">--}}
                                {{--<ul class="navbar-nav">--}}
                                    {{--<li class="nav-item dropdown">--}}
                                        {{--<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"--}}
                                           {{--aria-haspopup="true" aria-expanded="false">Invoicing</a>--}}

                                        {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuUser">--}}
                                            {{--@can('view backend')--}}
                                            {{--<a href="{{ route('frontend.invoicing') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.invoicing')) }}">Hayneedle</a>--}}


                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

{{--=================--}}
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">Data</a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuUser">
                                        {{--@can('view backend')--}}
                                        <a href="{{ route('frontend.charts') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.products')) }}">Yearly Sales</a>
                                        <a href="{{ route('frontend.pie') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.charting')) }}">Category Sales</a>
                                        <a href="{{ route('frontend.cogs') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.cogs')) }}">2018 Cogs</a>
                                        <a href="{{ route('frontend.shipping_data') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.shipping_data')) }}">2018 Shipping Breakdown</a>
                                        <a href="{{ route('frontend.inventory_updates') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.inventory_updates')) }}">Inventory</a>
                                        <a href="{{ route('frontend.rdn') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.rdn')) }}">@lang('navs.frontend.rdn')</a>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endguest
            <li class="nav-item">
                <a href="{{route('frontend.invoicing')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.invoicing')) }}">
                    {{--@lang('navs.frontend.invoicing')--}}
                    Hayneedle
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}">
                    @lang('navs.frontend.contact')
                </a>
            </li>

            
        </ul>
    </div>
</nav>
