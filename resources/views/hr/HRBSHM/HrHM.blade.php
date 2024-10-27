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

    <h2>Bachelor of Science in Hospitality Management</h2>
    <div class="year-container">
        <div class="year-block">
            <h2>First Year</h2>
            <a href="{{('BSHM101') }}">
                <button>101</button>
            </a>
            <a href="{{('BSHM102') }}">
                <button>102</button>
            </a>

            <a href="{{('BSHM103') }}">
                <button>103</button>
            </a>
            
        </div>
        <div class="year-block">
            <h2>Second Year</h2>
            <a href="{{('BSHM201') }}">
                <button>201</button>
            </a>
            <a href="{{('BSHM202') }}">
                <button>202</button>
            </a>
            <a href="{{('BSHM203') }}">
                <button>203</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Third Year</h2>
            <a href="{{('BSHM301') }}">
                <button>301</button>
            </a>
            <a href="{{('BSHM302') }}">
                <button>302</button>
            </a>
            <a href="{{('BSHM303') }}">
                <button>303</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Fourth Year</h2>
            <a href="{{('BSHM401') }}">
                <button>401</button>
            </a>
            <a href="{{('BSHM402') }}">
                <button>402</button>
            </a>
            <a href="{{('BSHM403') }}">
                <button>403</button>
            </a>
        </div>
    </div>
    <a href="{{'HrCollegeCourse'}}">
        <button class="back-button">Back</button>
    </a>
</body>
