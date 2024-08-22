@extends('layouts.HrLayout')

@section('content')

<style>

h1 {
    font-size: 36px;
    font-weight: bold;
    color: black;
    
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #0F67B1;
}

.grid-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 40px;
    flex-wrap: wrap;
}

.section {
    text-align: center;
    width: 150px; /* Consistent width for all sections */
}

.section h2 {
    margin-bottom: 10px;
}

.section div {
    margin: 10px 0;
}

button {
    background-color: #7aa5d9;
    color: black;
    padding: 15px 30px; /* Padding inside the button */
    font-size: 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 150px; /* Width of the button */
    transition: background-color 0.3s ease;
    margin: 20px 0; /* Added margin to create space between buttons */
}

button:hover {
    background-color: #0F67B1;
}


</style>

    <h1> <center>STUDENT EVALUATION AND CONSULTATION</center></h1>

    <div class="grid-container">
        <div class="section">
            <h2>GRADE 7</h2>
            <div>
                <a href="{{('GRADE7-101') }}">
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
                <a href="{{('GRADE8-101') }}">
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
                <a href="{{('hrHS-G11ict') }}">
                    <button>ICT</button>
                </a>
            </div>
            <div>
                <a href="{{('hrHS-G11gas') }}">
                    <button>GAS</button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 12</h2>
            <div>
                <a href="{{('hrHS-G12stem') }}">
                    <button>STEM</button>
                </a>
            </div>
            <div>
                <a href="{{('hrHS-G12abm') }}">
                    <button>ABM</button>
                </a>
            </div>
            <div>
                <a href="{{('hrHS-G12ict') }}">
                    <button>ICT</button>
                </a>
            </div>
              <div>
                 <a href="{{('hrHS-G12gas') }}">
                    <button>GAS</button>
                </a>
            </div>
        </div>
       
        
    </div>
@endsection

