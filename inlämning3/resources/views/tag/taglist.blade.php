@extends('layouts.app')

@section('title', 'Tag')

@section('content')
    <h2>Tags</h2>
    <div class="list-group">
    @foreach($tags as $tag)
        <a href="{{ action('TagController@show', [$tag->id]) }}" class="list-group-item">
            <h4 class="list-group-item-heading">{{$tag->name}}</h4>
            <div class="list-group-item-text">
            <img class="icon" src="{{$tag->icon}}" alt="icon">
            @if (Auth::check())
                <div class="btn-group-vertical" role="group" aria-label="...">
                    <form action=" {{ action('TagController@destroy', [$tag->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form action=" {{ action('TagController@edit', [$tag->id]) }}" method="GET">
                        <button type="submit" class="btn btn-info">Edit</button>
                    </form>
                </div>
            @endif
            </div>
        </a>
    @endforeach

        @if (Auth::check())
            <form action=" {{ action('TagController@create') }}" method="GET">
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    @endif
    </div>
@endsection