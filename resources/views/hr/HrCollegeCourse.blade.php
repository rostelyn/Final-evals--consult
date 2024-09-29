<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/coursepick.css') }}">

</head>
<body>

<div class="header">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
</div>

    <h2>COURSES</h2>
    <div class="course-container">
          <a href="{{ route('HrBSIT') }}">
            <button>
            Bachelor of Science and Technology Information
            </button>   
        </a>
        <a href="#">
            <button>
            Bachelor of Science and Hospitality Management
            </button>
        </a>
        <a href="#">
            <button>
            Associate in Computer Technology
            </button>
        </a>
        <a href="#">
            <button>
                Hotel and Restaurant Technology
            </button>
        </a>
        <a href="#">
            <button>
            Bachelor of Science in Computer Science
            </button>
        </a>
        <a href="#">
            <button>
                CET
            </button>
        </a>
        <a href="#">
            <button>
            Hotel & Restaurant Services
            </button>
        </a>
        <a href="#">
            <button>
                TOURISM
            </button>
        </a>
    </div>

    <a href="{{ 'HrStudentList' }}">
        <button class="back-button">Back</button>
    </a>

    
</body>
</html>