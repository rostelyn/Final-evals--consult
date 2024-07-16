@extends('student.evaluation.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach($departments as $department)
                    <div class="col-md-6">
                        <a href="{{ ('/faculty/'.$department) }}" class="btn btn-success btn-block">{{ $department }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
