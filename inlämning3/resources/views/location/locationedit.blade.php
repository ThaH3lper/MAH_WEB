@extends('layouts.app')

@section('title', 'Edit Locations')

@section('content')
    <h2>Locations</h2>
    @if(isset($location))
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Edit event</h3>
            </div>
            <form action=" {{ action('LocationController@update', [$location->id]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="basic-addon1" 
                value="{{$location->name}}">
            </div>
            <div class="form-group">
                <input class="form-control" class="form-control"  aria-describedby="basic-addon1"  
                placeholder="Description" name="description" value="{{$location->description}}">
            </div>
            <button type="submit" class="btn btn-info">Save</button>      
    @else
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Create event</h3>
            </div>
            <form action=" {{ action('LocationController@store') }}" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="basic-addon1">
            </div>
            <div class="form-group">
                <input class="form-control" class="form-control"  aria-describedby="basic-addon1"  
                placeholder="Description" name="description">
            </div>
            <button type="submit" class="btn btn-success">Create</button>  
    @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
        </div>
@endsection