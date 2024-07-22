@extends('layouts.resources')

@section('content')

<h1>Registration Page</h1>

<form action="{{route('register')}}" method="post">
    @csrf
    <div class="row">
        <input type="text" name="name" id="name" placeholder="Name">
        <label for="name">
            @error('name')
                <span style="color:red">{{$message}}</span>
            @enderror
        </label>
        
    </div>
    <div class="row">
        <input type="text" name="username" id="username" placeholder="Username">
        <label for="username">
            @error('username')
                <span style="color:red">{{$message}}</span>
            @enderror
        </label>
        
    </div>
    <div class="row">
        <input type="password" name="password" id="password" placeholder="Password">
        <label for="password">
            @error('password')
                <span style="color:red">{{$message}}</span>
            @enderror
        </label>
        
    </div>

    <div class="row">
        <button class="bn5">Submit</button>
    </div>
</form>

@endsection

@section('title')
Registration
@endsection