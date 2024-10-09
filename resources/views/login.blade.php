<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Login Page</title>
</head>
<body>
       
     <div class="login-background">
        <div class="login-overlay">
            <form action="{{ route('login.submit') }}" method="post" class="login-form">
                @csrf
                <div class="login-container">
                    <div class="login-header">
                         <img src="{{ asset('css/GeneralResources/logoo.jpg') }}" alt="Logo" class="logo">
                    </div>
                    @error('message')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                 
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    <div class="form-buttons">      <a href="register">Register if you Dont have Account</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
