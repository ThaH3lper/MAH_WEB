@extends('layouts.app')

@section('title', 'Location')

@section('content')
<div class="panel panel-success">
  <div class="panel-body">{{$location->name}}</div>
  <div class="panel-footer">
    <p>Description: {{$location->description}}</p>
</div>
@endsection