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
                        <h2>Log in</h2>
                    </div>
                    @error('message')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    
                    <!-- Role Selection Dropdown -->
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="student">Student</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <!-- Username/Student ID -->
                    <div class="form-group" id="username-group">
                        <label for="username" id="username-label">Student ID</label>
                        <input type="text" name="username" id="username" placeholder="Student ID" required>
                    </div>
                    
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>

                    <!-- Remember Me -->
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-buttons">
                        <a href="register">Register if you Don't have an Account</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script to dynamically change placeholders -->
    <script>
        $(document).ready(function() {
            $('#role').change(function() {
                const selectedRole = $(this).val();
                if (selectedRole === 'student') {
                    $('#username-label').text('Student ID');
                    $('#username').attr('placeholder', 'Student ID');
                } else if (selectedRole === 'admin') {
                    $('#username-label').text('Username');
                    $('#username').attr('placeholder', 'Username');
                }
            });
        });
    </script>
</body>
</html>
