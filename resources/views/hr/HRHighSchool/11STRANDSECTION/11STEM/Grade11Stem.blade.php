@extends('layouts.HrLayout')

@section('content')
    <style>
        h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        h2 {
            font-size: 20px;
            color: #555;
            text-align: center;
        }

        .button-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .button-container a {
            text-decoration: none;
        }

        .button-container button {
            padding: 10px 20px;
            background: linear-gradient(45deg, #4CAF50, #8BC34A);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .button-container button:hover {
            background: linear-gradient(45deg, #45a049, #7CB342);
        }
    </style>

    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>STEM</h2>
    <div class="button-container">
        <a href="{{ ('11STEM101') }}">
            <button>101</button>
        </a>
        <a href="{{ ('hrProfG11-abm201') }}">
            <button>201</button>
        </a>
    </div>
@endsection
