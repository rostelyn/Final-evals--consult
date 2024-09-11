@extends('layouts.evaluation-layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
<body>
    <header>
        STUDENT EVALUATION AND CONSULTATION
    </header>
    <div class="main-container">
        <div>
                <a href="{{ route('logout') }}"><h5>Log Out</a>
        </div>    
        <button>About</button>
    </div>
</body>
</html>
@endsection