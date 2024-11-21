<!DOCTYPE html>
<html lang="en">
   
<link rel="stylesheet" href="{{ asset('css/Student/facultyhighschool.css') }}">
<body>
    
<div class="hsfaculty-page">

    <div class="header">
        <h2>{{ $department }}</h2>
    </div>

    <div class="hsfaculty-head">
        <div class="hsfaculty-picture">
            @if($details['head']['image'])
                <img src="{{ asset($details['head']['image']) }}" alt="Head Picture" class="faculty-img">
            @else
                <p>No Image Available</p>
            @endif
        </div>
        <p>High School Department Head: {{ $details['head']['name'] }}</p>
        <a href="{{ route('evaluation-form') }}" class="btn-evaluate">Evaluate</a>
    </div>

    <div class="hsfaculty-list">
        @foreach($details['members'] as $member)
            <div class="hsfaculty-member">
                <div class="hsfaculty-picture">
                    @if($member['image'])
                        <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="faculty-img">
                    @else
                        <p>No Image Available</p>
                    @endif
                </div>
                <p>{{ $member['name'] }}</p>
                <a href="{{ route('evaluation-form') }}" class="btn-evaluate">Evaluate</a>
            </div>
        @endforeach
    </div>
</div>


    
</body>
</html>