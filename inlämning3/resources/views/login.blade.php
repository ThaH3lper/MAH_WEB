@extends('layouts.app')

@section('title', 'Login')

@section('content')
@if(isset($data['ins']) && $data['ins'])
        <div class="alert alert-success" role="alert">
            <p>Login succeed!</p>
        </div>
@endif

@if(isset($data['inf']) && $data['inf'])
        <div class="alert alert-danger" role="alert">
            <p>Login failed! Wrong username or password.</p>
        </div>
@endif

@if(isset($data['outs']) && $data['outs'])
        <div class="alert alert-success" role="alert">
            <p>Logout succeed!</p>
        </div>
@endif

    <form action="/login" method="post">

        <div>
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
        </div>

        <div>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>

        <div>
            Remember me <input type="checkbox" name="remember"> 
        </div>
        <button type="submit">Login</button>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    </form>
@endsection