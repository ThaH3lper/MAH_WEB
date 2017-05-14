@extends('layouts.app')

@section('title', 'Edit Events')

@section('content')
    <h2>Events</h2>
    @if(isset($data['error']))
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        <p>{{$data['error']}}</p>
    </div>
    @endif
    @if(isset($data['event']))
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Edit event</h3>
            </div>
            <form action=" {{ action('EventController@update', [$data['event']->id]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="basic-addon1" 
                value="{{$data['event']->name}}">
            </div>
            <div class="form-group">
                <input class="form-control" class="form-control"  aria-describedby="basic-addon1"  
                placeholder="Description" name="description" value="{{$data['event']->description}}">
            </div>
            <p>Must follow format: yyyy-mm-dd hh:mm:ss</p>
            <div class="form-group">
                <input type="text" class="form-control"  name="date" placeholder="Date" aria-describedby="basic-addon1" 
                value="{{$data['event']->date}}">
            </div>        
    @else
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Create event</h3>
            </div>
            <form action=" {{ action('EventController@store') }}" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name" aria-describedby="basic-addon1" id="inputError">
            </div>
            <div class="form-group">
                <input class="form-control" name="description" aria-describedby="basic-addon1"  
                placeholder="Description">
            </div>
            <p>Must follow format: yyyy-mm-dd hh:mm:ss</p>
            <div class="form-group">
                <input type="text" class="form-control"  name="date" placeholder="Date" aria-describedby="basic-addon1">
            </div>  
    @endif

    @foreach($data['locations'] as $location)
        <div class="form-group">
            @if((isset($data['event']) && $location->id === $data['event']->location_id) || $location->checked)
                <label><input checked type="radio" value="{{$location->id}}" name="location">{{$location->name}}</label>
            @else
                <label><input type="radio" name="location" value="{{$location->id}}">{{$location->name}}</label>
            @endif
        </div>
    @endforeach

    @foreach($data['tags'] as $tag)
    <div class="form-group">
        @if($tag->checked)
            <label><input checked type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}}</label>
        @else
            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}}</label>
        @endif
    </div>
    @endforeach

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
     @if(isset($data['event']))
            <button type="submit" class="btn btn-info">Save</button>
        @else
            <button type="submit" class="btn btn-success">Create</button>
        @endif
    </form>
</div>
@endsection
