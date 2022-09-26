<?php $rtlValue = (app()->getLocale()=='ar'?'rtl':'ltr');
?>
    <!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{$rtlValue}}">
<head>
    <meta charset="utf-8" />
    <title>@yield("title") | لوحة التحكم</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

    <!--begin::Global Theme Styles -->
    @if($rtlValue=='rtl')
        <link href="{{asset('metronic/assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('metronic/assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{asset('metronic/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('metronic/assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endif
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!--RTL version:<link href="{{asset('metronic/assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles -->
    <link href="{{asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

<!--RTL version:<link href="{{asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->

    <!--end::Page Vendors Styles -->
    <link rel="shortcut icon" href="{{asset('metronic/assets/demo/default/media/img/logo/favicon.ico')}}" />
    <style>
        body,.btn.m-btn--custom,.m-subheader .m-subheader__title,.form-control,.btn,.col-form-label{
            font-family: 'Tajawal', sans-serif;
        }
        h3,h1,h2,h4,h5,h6{
            font-weight:bold !important;
        }
        .form-control{
            padding:0.75rem 1.15rem;
        }
        .col-form-label,.form-control-label
        {
            font-size: 16px !important;
        }
        .m-radio
        {
            font-size: 14px !important;
        }
        hr{
            height:0px !important;
            border:none;
            margin-top:25px;
            border-bottom:1px solid #ebedf2;

        }
        .my-active span{
            background-color: #00c5dc !important;
            color: white !important;
            border-color: #00c5dc !important;
        }

        .fade{
            opacity: 1;
            -webkit-transition: opacity .15s linear;
            -o-transition: opacity .15s linear;
            transition: opacity .15s linear;
        }
        .sorting{
            text-align:center;
        }
        th{
            text-align:right !important;
        }
        .m-radio, .m-checkbox{
            margin-bottom:0px !important;
        }
        select.form-control{
            padding-top:5px;
        }
        .custom-arrow-style {
            right: auto !important;
            left: 13px !important;
        }
    </style>
    @yield("css")
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- BEGIN: Header -->
@include("layouts.admin.header")

<!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include("layouts.admin.aside")
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
            <div class=" row">


                @yield("content")

            </div>
        </div>
    </div>

    <!-- end:: Body -->

    @include("layouts.admin.footer")
</div>



<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>



<!--begin::Global Theme Bundle -->
<script src="{{asset('metronic/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('metronic/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

<!--begin::Page Vendors -->
<script src="{{asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}"
        type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="{{asset('metronic/assets/app/js/dashboard.js')}}" type="text/javascript"></script>

<!--end::Page Scripts -->

<script>
    $(".select2").select2();
</script>

<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script type="text/javascript">
    var pusher = new Pusher('{{env("PUSHER_APP_KEY")}}', {
        encrypted: true,cluster:'{{env("PUSHER_APP_CLUSTER")}}'
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('order-created');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\OrderCreated', function(data) {
        $(".user-notifications").append(`<p>New Order from `+data.message+`<br><span>about a minute ago</span></p>`)

        $(".notif-count").text(parseInt($(".notif-count").text())+1);
    });
</script>
@yield("js")
</body>

</html>
