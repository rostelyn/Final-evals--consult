<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrStudentProfile.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">


</head>
<body>  
      <div class="header">
        <h1>STUDENT EVALUATION AND CONSULTATION</h1>
     </div>
    <div class="row">
        <div class="column">
            <div class="picture-box center ">1x1 picture</div>
            <div class="info">
                <div class="label">DENN MARENZ ESCAT</div>
                <div class="label">dennHarenz@outlook.com</div>
            </div>
        </div>
        <div class="column">
            <table class="table">
                <tr>
                
                    <th>Gender</th>
                    <th>Student Number</th>
                </tr>
                <tr>
                    <td>Male</td>
                    <td>21-1111</td>
                
                </tr>
            </table>
        </div>
    </div>
            <div class="teacher-list h1">
              <h1>LIST OF TEACHERS</h1>
            </div>
    <div class="teacher-list">
        <div class="column">
            <table class="table">
                <tr>
                    <th>Name of Teacher</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>ARIES CAYABYAB</td>
                    <td>
                        <button type="button">Evaluation History</button>
                    </td>
                </tr>
                <tr>
                    <td>SIR PERCIAN</td>       
                    <td>
                    <button type="button" >Evaluation History</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <a href="{{ 'HrBSIT' }}">
        <button class="back-button">Back</button>
    </a>
</body>
</html>
