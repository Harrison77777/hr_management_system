<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}}</title>
    <!-- Styles -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/static/assets/images/favicon.png')}}">
    <title>Monster Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
 

    <link href="{{asset('public/css/app.css')}}" rel="stylesheet">
 

    

    <link href="{{asset('public/static/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('public/static/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    @stack('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

</head>

<body>
        @yield('content')


       



    <script src="{{asset('public/js/app.js')}}"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('public/static/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('public/static/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('public/static/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('public/static/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('public/static/js/custom.min.js')}}"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('public/static/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

    @stack('js')
</body>

</html>