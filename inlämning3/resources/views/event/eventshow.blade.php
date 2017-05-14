@extends('layouts.app')

@section('title', 'Event')

@section('content')
<div class="panel panel-success">
  <div class="panel-body">{{$event->name}}</div>
  <div class="panel-footer">
    <p>Description: {{$event->description}}</p>
    <p>Location: {{$event->location->name}}</p>
    <p>Time: {{$event->date}}</p>
    <p>Tags:</p>
    @foreach($event->tags->chunk(6) as $chunk)
        <div class="row">
        @foreach($event->tags as $tag)
            <div class="col-xs-1">
                <a href="{{ action('TagController@show', [$tag->id]) }}">
                    <img class="icon" src="{{$tag->icon}}" alt="icon">
                </a>
            </div>
        @endforeach
        </div>
    @endforeach
    </div>
</div>

@endsection