@extends('layouts.app')

@section('title', 'Location')

@section('content')
<div class="panel panel-success">
  <div class="panel-body">{{$tag->name}}</div>
  <div class="panel-footer">
    <p>Description: {{$tag->description}}</p>
    <img class="icon" src="{{$tag->icon}}" alt="icon">
</div>
@endsection