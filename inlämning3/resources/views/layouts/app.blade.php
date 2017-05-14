
<html>
    <head>
        <title>Vad Händer - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container"> 
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="row">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{url('/')}}">What happens?</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="{{ Request::is('events') ? 'active' : '' }}"><a href="{{url('events')}}">Events</a></li>
                            <li class="{{ Request::is('locations') ? 'active' : '' }}"><a href="{{url('locations')}}">Locations</a></li>
                            <li class="{{ Request::is('tags') ? 'active' : '' }}"><a href="{{url('tags')}}">Tags</a></li>
                        </ul>
                        <div class="nav pull-right">
                            @if (Auth::check())
                            <form class="navform" action=" {{ action('LoginController@logout')}}" method="GET">
                                <button type="submit" class="btn btn-danger navbar-btn">Sign out</button>
                            @else
                            <form class="navform" action=" {{ action('LoginController@index')}}" method="GET">
                                <button type="submit" class="btn btn-success navbar-btn">Sign in</button>
                            @endif
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </body>
</html>