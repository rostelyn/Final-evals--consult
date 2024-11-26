<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>
        Welcome DpHead
    </h2>
    
    <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"><h5>Log Out</h5></button>
            </form>
</body>
</html>