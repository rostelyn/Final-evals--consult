@extends('student.evaluation.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>{{ $department }} Department</h2>
            <div class="department-head">
                <h3>Department Head: {{ $details['head'] }}</h3>
                <a href="{{ route('evaluation-form') }}" class="btn btn-primary">Evaluate</a>
            </div>
            <div class="row">
                @foreach($details['members'] as $member)
                    <div class="col-md-6">
                        <div class="faculty-member">
                            <div class="picture">
                            </div>
                            <p>{{ $member }}</p>
                            <a href="{{ route('evaluation-form') }}" class="btn btn-primary">Evaluate</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
