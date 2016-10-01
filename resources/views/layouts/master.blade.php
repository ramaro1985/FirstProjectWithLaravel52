<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta content="make your own design" name="description">
    <meta content="fence, railing, welding, gutter, stainless steel system, iron, gates, metal, copper, metal sheets, Florida company, metal company, Miami metal company, Miami fence, Miami gutters, Miami Railing, Hialeah company, Hialeah sheet Metal, Miami Sheet Metals, Hi"
          name="keywords">
    <meta content="Authentic Metals, LLC" property="og:site_name">
    <meta content="Authentic Metals, LLC" property="og:title">
    <meta content="make your own design" property="og:description">
    <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/x-icon" href="{{ URL::to('src/images/icon.png') }}"/>

    <link href="{{ URL::to('src/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ URL::to('src/css/jquery-ui-1.10.4.custom.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::to('src/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::to('src/css/fal-style.css') }}" rel="stylesheet"/>
    <link href="{{ URL::to('src/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/jRating.jquery.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/jquery.bxslider.min.css') }}" rel="stylesheet">

    <script src="{{ URL::to('src/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
    <script>
        window.fbAsyncInit = function () {
            // init the FB JS SDK
            FB.init({
                appId: '446247792210841', // App ID from the app dashboard
                status: true, // Check Facebook Login status
                version: 'v2.3'
            });
        };

        jQuery(document).ready(function () {

            jQuery("#panel_sell").parent().mouseover(function () {
                jQuery(this).find(".grises img").addClass("hover");
                jQuery('#latter').attr("src", '{{ URL::to('src/images/home/latter1.jpg') }}')
            });
            jQuery("#panel_sell").parent().mouseout(function () {
                jQuery(this).find(".grises img").addClass("hover");
                jQuery('#latter').attr("src", '{{ URL::to('src/images/home/latter2.jpg') }}');
            });
            jQuery("#panel_buy").parent().mouseover(function () {
                jQuery(this).find(".grises img").addClass("hover");
                jQuery('#house').attr("src", '{{ URL::to('src/images/home/house1.jpg') }}');
            });
            jQuery("#panel_buy").parent().mouseout(function () {
                jQuery(this).find(".grises img").addClass("hover");
                jQuery('#house').attr("src", '{{ URL::to('src/images/home/house2.jpg') }}');
            });

        });

        if (window.location.hash == '#_=_') {
            window.location.hash = ''; // for older browsers, leaves a # behind
            history.pushState('', document.title, window.location.pathname); // nice and clean
        }
    </script>
</head>
<body>

@yield('content')
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>

<script src="{{ URL::to('src/js/jquery-ui-1.10.4.min.js') }}"></script>
<script src="{{ URL::to('src/js/raphael.min.js') }}"></script>
<script src="{{ URL::to('src/js/jquery.usmap.min.js') }}"></script>
<script src="{{ URL::to('src/js/jRating.jquery.min.js') }}"></script>
<script src="{{ URL::to('src/js/jquery.bxslider.min.js') }}"></script>
<script src="{{ URL::to('src/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::to('src/js/app.js') }}"></script>
</body>
</html>