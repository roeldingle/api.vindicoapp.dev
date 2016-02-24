<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('page_title', 'Default Page Title')</title>
        <meta name="description" content="">
        <link rel='stylesheet'  href='//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/paper/bootstrap.min.css' type='text/css' />
       
        <style>
            body {
                padding-top: 100px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('docs/css/main.css') }}" />
        <script src="{{ asset('docs/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
       
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-ocean-green navbar-fixed-top" style="padding-bottom: 8px;" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{ URL::route('doc.v1.index') }}">@yield('navbar_title')</a>
        </div>
      </div>
    </nav>