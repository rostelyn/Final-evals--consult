@extends('layouts.evaluation-layout')

@section('content')
    <h1 style="text-align: center; font-size: 2rem; color: #333; margin-bottom: 40px;">Select Highschool Department </h1>

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 0 20px;">
        @foreach($departmenthighschools as $departmenthighschool)
            <div style="flex: 1 1 calc(33.333% - 40px); max-width: calc(33.333% - 40px); text-align: center;">
                <a href="{{ url('/facultyhighschool/'.$departmenthighschool) }}" style="font-size: 1.5rem; color: #fff; background-color: #4BC0C0; padding: 15px 20px; border-radius: 5px; text-decoration: none; display: block; transition: background-color 0.3s;">
                    {{ $departmenthighschool }}
                </a>
            </div>
        @endforeach
    </div>
@endsection
