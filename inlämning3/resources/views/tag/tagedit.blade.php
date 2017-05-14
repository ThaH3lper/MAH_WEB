@extends('layouts.app')

@section('title', 'Edit Tag')

@section('content')
    <h2>Tags</h2>
    @if(isset($tag))
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Edit tag</h3>
            </div>
            <form action=" {{ action('TagController@update', [$tag->id]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="basic-addon1" 
                value="{{$tag->name}}">
            </div>
            <div class="form-group">
                <input class="form-control" class="form-control"  aria-describedby="basic-addon1"  
                placeholder="Description" name="description" value="{{$tag->description}}">
            </div>
            <div class="form-group">
                <input class="form-control" class="form-control"  aria-describedby="basic-addon1"  
                placeholder="icon url" name="icon" value="{{$tag->icon}}">
            </div>
            <button type="submit" class="btn btn-info">Save</button>      
    @else
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Create tag</h3>
            </div>
            <form action=" {{ action('TagController@store') }}" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="basic-addon1">
            </div>
            <div class="form-group">
                <input class="form-control" class="form-control"  aria-describedby="basic-addon1"  
                placeholder="Description" name="description">
            </div>
            <div class="form-group">
                <input class="form-control" class="form-control"  aria-describedby="basic-addon1"  
                placeholder="icon url" name="icon">
            </div>
            <button type="submit" class="btn btn-success">Create</button>  
    @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
        </div>
@endsection