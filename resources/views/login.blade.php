<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
      <h1>Login Page</h1>
    

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
</body>
</html>