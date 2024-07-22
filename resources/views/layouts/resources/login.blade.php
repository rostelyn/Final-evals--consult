@extends('layouts.resources')

@section('content')

    <h1>Log In Page</h1>
    

    <form action="{{route('login.submit')}}" method="post">
        @csrf

        @error('message')
        <p>{{$message}}</p>
        @enderror

        <div class="row">
            <label for="username"></label>
            <input type="text" name="username" id="username" placeholder="Username">
        </div>
        <div class="row">
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>
        <div class="row">
            <button class="bn5">Submit</button>
        </div>
    </form>
@endsection

@section('title')
    Login Page
@endsection