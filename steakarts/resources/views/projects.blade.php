
@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div id="welcome">
        <h2>PROJECTS</h2>
    </div>
        
    <div class="projects">
        <div class="shadow-down"></div>

        <div class="container">
            @foreach($projects->chunk(3) as $projectrow)
                <div class="row">
                    @foreach($projectrow as $project)
                        <article class="col-md-4">
                        <a class="project-box" href="projects/{{$project->id}}">
                            <div class="tags">
                                <div class="tagsBox">
                                    <span class="label label-primary">#C</span>
                                    <span class="label label-primary">MonoGame</span>
                                    <span class="label label-success">2D</span>
                                </div>
                            </div>
                            <img src="{{ asset('/images/thumbnails/' . $project->thumbnail) }}">
                            <h3>{{$project->name}}</h3>
                            <p>{{$project->description}}</p>
                        </a>
                        </article>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection