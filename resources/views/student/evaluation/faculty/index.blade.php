<!DOCTYPE html>
<html lang="en">
   

<body>
    

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">

    <h1 class="department-title">Select Department</h1>

    <div class="department-container">
        @foreach($departments as $department)
            <div class="department-item">
                <a href="{{ url('/faculty/'.$department) }}" class="department-link">
                    {{ $department }}
                </a>
            </div>
        @endforeach
    </div>


    <style>
        
*{
    font-family: 'Georgia';
}

.department-title {
    font-family: "Averia Serif Libre", serif;
    color: black;
    text-align: center;
}

.department-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 0 20px;
}

.department-item {
    flex: 1 1 calc(33.333% - 40px);
    max-width: calc(33.333% - 40px);
    text-align: center;
}

.department-link {
    font-size: 1.5rem;
    color: #fff;
    background-color: #18A558;
    padding: 15px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s;
}

.department-link:hover {
    background-color: #88c999;
}

    </style>

</body>
</html>