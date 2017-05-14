@extends('layouts.app')

@section('title', 'Locations')

@section('content')
    <h2>locations</h2>
    <div class="list-group">
    @foreach($locations as $location)
        <a href="{{ action('LocationController@show', [$location->id]) }}" class="list-group-item">
            <h4 class="list-group-item-heading">{{$location->name}}</h4>
            <div class="list-group-item-text">
            @if (Auth::check())
                <div class="btn-group-horizontal" role="group" aria-label="...">
                    <form action=" {{ action('LocationController@destroy', [$location->id]) }}" method="POST" class="btn">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form action=" {{ action('LocationController@edit', [$location->id]) }}" method="GET" class="btn">
                        <button type="submit" class="btn btn-info">Edit</button>
                    </form>
                </div>
            @endif
            </div>
        </a>
    
    @endforeach

        @if (Auth::check())
            <form action=" {{ action('LocationController@create') }}" method="GET">
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    @endif
    </div>
@endsection