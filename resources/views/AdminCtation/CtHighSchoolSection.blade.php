@extends('layouts.AdminConsult-layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/HighSchoolButton.css') }}">


    <h1> <center>STUDENT EVALUATION AND CONSULTATION</center></h1>

    <div class="grid-container">
        <div class="section">
            <h2>GRADE 7</h2>
            <div>
                <a href="{{('CTGrade7-101') }}">
                    <button>101</button>
                </a>
            </div>
            <div>
                <a href="{{('') }}">
                    <button>201</button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 8</h2>
            <div>
                <a href="{{('CTGrade8-101') }}">
                    <button>101</button>
                </a>
            </div>
            <div>
                <a href="{{('') }}">
                    <button>201</button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 9</h2>
            <div>
                <a href="{{('CTGrade9-101') }}">
                    <button>101</button>
                </a>
            </div>
            <div>
                <a href="{{('') }}">
                    <button>201</button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 10</h2>
            <div>
                <a href="{{('CTGrade10-101') }}">
                    <button>101</button>
                </a>
            </div>
            <div>
                <a href="{{('') }}">
                    <button>201</button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 11</h2>
            <div>
                <a href="{{('Grade11Stem') }}">
                    <button>STEM</button>
                </a>
            </div>
            <div>
                <a href="{{('Grade11Abm') }}">
                    <button>ABM</button>
                </a>
            </div>
            <div>
                <a href="{{('GRADE11Ict') }}">
                    <button>ICT</button>
                </a>
            </div>
            <div>
                <a href="{{('GRADE11Gas') }}">
                    <button>GAS</button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 12</h2>
            <div>
                <a href="{{('GRADE12Stem') }}">
                    <button>STEM</button>
                </a>
            </div>
            <div>
                <a href="{{('GRADE12Abm') }}">
                    <button>ABM</button>
                </a>
            </div>
            <div>
                <a href="{{('GRADE12Ict') }}">
                    <button>ICT</button>
                </a>
            </div>
              <div>
                 <a href="{{('GRADE12Gas') }}">
                    <button>GAS</button>
                </a>
            </div>
        </div>
       
        
    </div>
@endsection

