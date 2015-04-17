<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel | Bidding System</title>


    {!! HTML::style("vendor/css/app.css")!!}
    {!! HTML::style("vendor/css/bootstrap-datetimepicker.min.css")!!}
    {!! HTML::style("//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css")!!}

    <!-- Fonts -->
    {!! HTML::style("//fonts.googleapis.com/css?family=Roboto:400,300")!!}

    <!--[if lt IE 9]>
    {!! HTML::script("https://oss.maxcdn.com/respond/1.4.2/respond.min.js")  !!}
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel Bidding Portal</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li>{!! HTML::link("login","Login") !!}</li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>{!! HTML::link("add-product","Add Items") !!}</li>
                            <li>{!! HTML::link("store","My Store") !!}</li>
                            <li>{!! HTML::link("purchases","My Purchases") !!}</li>
                            <li>{!! HTML::link("auth/logout","Sign Out") !!}</li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Scripts -->
{!! HTML::script("vendor/js/jquery-2.1.3.js")  !!}
{!! HTML::script("//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js")  !!}
{!! HTML::script("vendor/js/bootstrap-datetimepicker.min.js")  !!}
</body>
</html>
