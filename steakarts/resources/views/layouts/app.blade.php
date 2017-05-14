
<html>
    <head>
        <title>Steak Arts - @yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
    <!--NAVIGATION-->
        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="index.html"><img src="images/steak_arts.png" class="img" alt="SteakArs" ></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="about.html">About</a></li> 
                </ul>
            </div>
        </div>
        </nav>
        <div class="blocker"></div>
        <!--NAVIGATION END-->

        @yield('content')

        <footer>
            <div class="container">
                <p>&copy; 2017 Steak Arts</p>
                <p>Contact me: patrik@steakarts.com</p>
            </div>
        </footer>
    </body>
</html>