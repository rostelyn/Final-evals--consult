<!DOCTYPE html>
<html lang="en">
   

<body>
    

    <h1 class="department-heading">Select Highschool Department</h1>

    <div class="department-container">
        @foreach($departmenthighschools as $departmenthighschool)
            <div class="department-card">
                <a href="{{ url('/facultyhighschool/'.$departmenthighschool) }}" class="department-link">
                    {{ $departmenthighschool }}
                </a>
            </div>
        @endforeach
    </div>

    <style>
    
.department-heading {
    text-align: center;
    font-size: 2rem;
    color: #0F67B1;
    margin-bottom: 40px;
}

.department-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 0 20px;
}

.department-card {
    flex: 1 1 calc(33.333% - 40px);
    max-width: calc(33.333% - 40px);
    text-align: center;
}

.department-link {
    font-size: 1.5rem;
    color: #fff;
    background-color: #0F67B1;
    padding: 15px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s;
}

.department-link:hover {
    background-color: #7aa5d9; 
}

    </style>

</body>
</html>