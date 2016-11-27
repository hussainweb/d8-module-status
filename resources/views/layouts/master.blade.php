<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        Drupal 8 Module Status Checker
        @if (isset($title))
            &mdash; {{ $title }}
        @endif
    </title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    @stack('styles')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Drupal 8 Upgrade Helper</a>
            </div>

            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="navbar navbar-inverse footer">
        <div class="container">
            <div class="navbar-text pull-left">
                <p>Drupal is a <a href="http://drupal.com/trademark" target="_blank">registered trademark</a> of <a href="http://buytaert.net/" target="_blank">Dries Buytaert</a>.</p>
                <p>This application is licensed under <a href="https://github.com/hussainweb/d8-module-status/blob/master/LICENSE.md">GPL-2</a>. It is built with open source components <a href="https://github.com/hussainweb/d8-module-status#license">licensed under GPL, MIT, BSD, and other permissive licenses</a>.</p>
            </div>
            <div class="navbar-text pull-right">
                <a href="https://twitter.com/hussainweb"><i class="fa fa-twitter-square fa-2x"></i></a>
                <a href="https://github.com/hussainweb"><i class="fa fa-github-square fa-2x"></i></a>
                <a href="https://plus.google.com/+HusainD/"><i class="fa fa-google-plus-square fa-2x"></i></a>
                <a href="https://in.linkedin.com/in/husainad"><i class="fa fa-linkedin-square fa-2x"></i></a>
                <a href="https://www.facebook.com/hussainweb"><i class="fa fa-facebook-square fa-2x"></i></a>
            </div>
        </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-64570324-3', 'auto');
        ga('send', 'pageview');

    </script>
</body>
</html>
