<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HighSchool</title>
</head>
<body>
    
<link rel="stylesheet" href="{{ asset('css/HighSchoolButton.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">



    <h1> <center> STUDENT EVALUATION AND CONSULTATION </center></h1>

    <div class="grid-container">
        <div class="section">
            <h2>GRADE 7</h2>
            <div>
                <a href="{{('CTGrade7-101') }}">
                    <button>101</button>
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
        </div>

        <div class="section">
            <h2>GRADE 9</h2>
            <div>
                <a href="{{('CTGrade9-101') }}">
                    <button>101</button>
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
        </div>
         <div class="section">
            <h2>GRADE 11</h2>
            <div>
                <a href="{{('Grade11Lovelace') }}">
                    <button>Lovelace</button>
                </a>
            </div>
            <div>
                <a href="{{('Grade11Duflo') }}">
                    <button>Duflo</button>
                </a>
            </div>
            <div>
                <a href="{{('Grade11StClare') }}">
                    <button>St.Clare</button>
                </a>
            </div>
            <div>
                <a href="{{('Grade11EsCoZier') }}">
                    <button>Escozier</button>
                </a>
            </div>
             <div>
                <a href="{{('Grade11Aristotle') }}">
                    <button>Pythagoras/
                        Aristotle
                    </button>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>GRADE 12</h2>
            <div>
                <a href="{{('Torvalds') }}">
                    <button>Torvalds</button>
                </a>
            </div>
            <div>
                <a href="{{('Marshall') }}">
                    <button>Marshall</button>
                </a>
            </div>
             <div>
                <a href="{{('Marcus') }}">
                    <button>MarCus</button>
                </a>
            </div>
              <div>
                 <a href="{{('SanPedroCalungsod') }}">
                    <button>SanPedro 
                            Calungsod</button>
                </a>
            </div>
               <div>
                  <a href="{{('Einstein') }}">
                    <button>Fibonacci/
                            Einstein</button>
                  </a>
               </div>
        </div>
    </div>
 </body>
</html>

