
@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div id="welcome">
    <h2>Pacman</h2>
    <span class="label label-primary">C#</span>
    <span class="label label-primary">MonoGame</span>
    <span class="label label-success">2D</span>
</div>
    
<div class="projectContent"> 
    <div class="container">
        
        <!--Video-->
        @isset($project->youtube)
            <div class="youtube">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $project->youtube }}" frameborder="0" allowfullscreen></iframe>
            </div>
        @endisset
    </div>
        
        <!--Text-->
        <div class="text">
            <div class="container">
                {{ $project->content }}
            </div>
        </div>
    
    <div class="container">
        <!--Carusel-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
                <li data-target="#myCarousel" data-slide-to="6"></li>
                <li data-target="#myCarousel" data-slide-to="7"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active"><a href="pictures/Pacman_1.png"><img src="pictures/Pacman_1.png" alt="Project Image"></a></div>
                <div class="item"><a href="pictures/Pacman_2.png"><img src="pictures/Pacman_2.png" alt="Project Image"></a></div>
                <div class="item"><a href="pictures/Pacman_3.png"><img src="pictures/Pacman_3.png" alt="Project Image"></a></div>
                <div class="item"><a href="pictures/Pacman_4.png"><img src="pictures/Pacman_4.png" alt="Project Image"></a></div>
                <div class="item"><a href="pictures/Pacman_5.png"><img src="pictures/Pacman_5.png" alt="Project Image"></a></div>
                <div class="item"><a href="pictures/Pacman_6.png"><img src="pictures/Pacman_6.png" alt="Project Image"></a></div>
                <div class="item"><a href="pictures/Pacman_7.png"><img src="pictures/Pacman_7.png" alt="Project Image"></a></div>
                <div class="item"><a href="pictures/Pacman_8.png"><img src="pictures/Pacman_8.png" alt="Project Image"></a></div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div> 
        <!--Carusel-->
    </div>
</div>
@endsection