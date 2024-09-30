<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="{{ asset('css/HighSchoolButton.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">

</head>
    <body>
        <div class="header">
                <h1>STUDENT EVALUATION AND CONSULTATION</h1>
         </div>

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
            <a href="{{ 'HrStudentList' }}">
        <button class="back-button">Back</button>
    </a>
</body>
</html>
