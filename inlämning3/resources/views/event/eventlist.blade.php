@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <h2>Events</h2>
    <div class="list-group">
    @foreach($events as $event)
        <a href="{{ action('EventController@show', [$event->id]) }}" class="list-group-item">
            <h4 class="list-group-item-heading">{{$event->name}}</h4>
            <div class="list-group-item-text">
                <p>Location: {{$event->location->name}}</p>
                <p>Time: {{$event->date}}</p>
            @foreach($event->tags as $tag)
                <img class="icon" src="{{$tag->icon}}" alt="icon">
            @endforeach
            @if (Auth::check())
                <div class="btn-group-horizontal" role="group" aria-label="...">
                    <form action=" {{ action('EventController@destroy', [$event->id]) }}" method="POST" class="btn">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form action=" {{ action('EventController@edit', [$event->id]) }}" method="GET" class="btn">
                        <button type="submit" class="btn btn-info">Edit</button>
                    </form>
                </div>
            @endif
            </div>
        </a>
    @endforeach
    @if (Auth::check())
            <form action=" {{ action('EventController@create') }}" method="GET">
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    @endif
    </div>
@endsection