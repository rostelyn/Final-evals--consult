@extends('layouts.HrLayout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/HighSchoolButton.css') }}">


    <h1> <center>STUDENT EVALUATION AND CONSULTATION</center></h1>

    <div class="grid-container">
        <div class="section">
            <h2>GRADE 7</h2>
            <div>
                <a href="{{('Grade7-101') }}">
                    <button>101</button>
                </a>
            </div>
            <div>
                <a href="{{('GRADE7-201') }}">
                    <button>201</button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 8</h2>
            <div>
                <a href="{{('Grade8-101') }}">
                    <button>101</button>
                </a>
            </div>
            <div>
                <a href="{{('GRADE8-201') }}">
                    <button>201</button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 9</h2>
            <div>
                <a href="{{('GRADE9-101') }}">
                    <button>101</button>
                </a>
            </div>
            <div>
                <a href="{{('GRADE9-201') }}">
                    <button>201</button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 10</h2>
            <div>
                <a href="{{('GRADE10-101') }}">
                    <button>101</button>
                </a>
            </div>
            <div>
                <a href="{{('GRADE10-201') }}">
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

