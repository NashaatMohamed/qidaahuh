<?php
$lang = app()->getLocale();
$rtl = $lang=='ar'?'rtl':'ltr';
?>
    <!DOCTYPE html>
<html lang="{{$lang}}" dir="{{$rtl}}">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>الادارة | @yield("title")</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    @if($rtl=='rtl')
        <link href="{{ asset('metronic/assets/vendors/base/vendors.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href='{{ asset("metronic/assets/vendors/base/vendors.bundle.rtl.css") }}' rel="stylesheet" type="text/css" />-->
        <link href="{{ asset('metronic/assets/demo/default/base/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href='{{ asset("metronic/assets/demo/default/base/style.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />-->
    @else
        <link href="{{ asset('metronic/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href='{{ asset("metronic/assets/vendors/base/vendors.bundle.rtl.css") }}' rel="stylesheet" type="text/css" />-->
        <link href="{{ asset('metronic/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href='{{ asset("metronic/assets/demo/default/base/style.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />-->

    @endif

    <link href="{{ asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href='{{ asset("metronic/assets/demo/default/media/img/logo/favicon.ico") }}' />
    @yield("css")
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- BEGIN: Header -->
    <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">

                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="index.html" class="m-brand__logo-wrapper">
                                <img alt="" src='{{ asset("metronic/assets/demo/default/media/img/logo/logo_default_dark.png") }}' />
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">

                            <!-- BEGIN: Left Aside Minimize Toggle -->
                            <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Responsive Header Menu Toggler -->
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Topbar Toggler -->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>

                            <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div>

                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">


                    <!-- BEGIN: Topbar -->
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src='{{ asset("metronic/assets/app/media/img/users/user4.jpg")}}' class="m--img-rounded m--marginless" alt="" />
												</span>
                                        <span class="m-topbar__username m--hide">Nick</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center" style="background: url({{ asset('metronic/assets/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src='{{ asset("metronic/assets/app/media/img/users/user4.jpg")}}' class="m--img-rounded m--marginless" alt="" />

                                                    </div>
                                                    <div class="m-card-user__details">
                                                        <span class="m-card-user__name m--font-weight-500">{{auth()->user()->name??''}}</span>
                                                        <a href="" class="m-card-user__email m--font-weight-300 m-link">{{auth()->user()->email??''}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide">
                                                            <span class="m-nav__section-text">Section</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="{{ route('admin.change') }}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-globe"></i>
                                                                <span class="m-nav__link-text">@lang('labels.change_pass')</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="{{route('lang',app()->getLocale()=='ar'?"en":"ar")}}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-globe"></i>
                                                                <span class="m-nav__link-text">{{app()->getLocale()=='ar'?"English":"عربي"}}</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit">
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <form method="POST" action="{{ route('logout') }}">
                                                                @csrf

                                                                <a href="route('logout')" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder"
                                                                   onclick="event.preventDefault();
																							this.closest('form').submit();">
                                                                    {{ __('labels.logout') }}
                                                                </a>
                                                            </form>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header>

    <!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

            <!-- BEGIN: Aside Menu -->
            <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
                @yield("aside")
            </div>

            <!-- END: Aside Menu -->
        </div>

        <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">@yield("title")</h3>
                    </div>
                    @yield("title-side")

                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
                @include('layouts.msg')
                @yield("content")
            </div>
        </div>
    </div>

    <!-- end:: Body -->

    <!-- begin::Footer -->
    <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2017 &copy; Metronic theme by <a href="https://keenthemes.com" class="m-link">Keenthemes</a>
							</span>
                </div>
                <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                    <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">About</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">Privacy</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">T&C</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">Purchase</span>
                            </a>
                        </li>
                        <li class="m-nav__item m-nav__item">
                            <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
                                <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- end::Footer -->
</div>


<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<script src='{{ asset("metronic/assets/vendors/base/vendors.bundle.js") }}' type="text/javascript"></script>
<script src='{{ asset("metronic/assets/demo/default/base/scripts.bundle.js") }}' type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src='{{ asset("metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js") }}' type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src='{{ asset("metronic/assets/app/js/dashboard.js") }}' type="text/javascript"></script>

<!--end::Page Scripts -->
@yield("js")
</body>

<!-- end::Body -->
</html>
