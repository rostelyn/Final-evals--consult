<head>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrYearList.css') }}">
</head>

<body>
<div class="header">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
</div>

    <h2>Computer Engineering Technology</h2>
    <div class="year-container">
        <div class="year-block">
            <h2>First Year</h2>
            <a href="{{('CET101') }}">
                <button>101</button>
            </a>
            <a href="{{('CET102') }}">
                <button>102</button>
            </a>
            <a href="{{('CET103') }}">
                <button>103</button>
            </a>
            
        </div>
        <div class="year-block">
            <h2>Second Year</h2>
            <a href="{{('CET201') }}">
                <button>201</button>
            </a>
            <a href="{{('CET202') }}">
                <button>202</button>
            </a>
            <a href="{{('CET203') }}">
                <button>203</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Third Year</h2>
            <a href="{{('CET301') }}">
                <button>301</button>
            </a>
            <a href="{{('CET302') }}">
                <button>302</button>
            </a>
            <a href="{{('CET303') }}">
                <button>303</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Fourth Year</h2>
            <a href="{{('CET401') }}">
                <button>401</button>
            </a>
            <a href="{{('CET402') }}">
                <button>402</button>
            </a>
            <a href="{{('CET403') }}">
                <button>403</button>
            </a>
        </div>
    </div>
    <a href="{{'HrCollegeCourse'}}">
        <button class="back-button">Back</button>
    </a>
</body>
