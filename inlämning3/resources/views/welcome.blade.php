@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="jumbotron">
        <h1>What happens?</h1>
        <p>Check out all the events! Get all the info about it and at what locations it's held. Make sure
        to find the correct event for you. Follow the tags!</p>
        <p>Know what happens!</p>
        <p><a class="btn btn-primary btn-lg" href="{{url('events')}}" role="button">Go to the events</a></p>
    </div>
@endsection