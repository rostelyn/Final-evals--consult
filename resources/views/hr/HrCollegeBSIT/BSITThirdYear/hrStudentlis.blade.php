@if ($evaluations->isEmpty())
    <p class="text-center">No evaluations found.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Teacher Name</th>
                <th>Subject</th>
                <th>Teaching Performance</th>
                <th>Library</th>
                <th>Laboratory</th>
                <th>Comfort Room</th>
                <th>Canteen</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->teacher_name }}</td>
                    <td>{{ $evaluation->subject }}</td>
                    <td>{{ $evaluation->teaching_performance }}</td>
                    <td>{{ $evaluation->library }}</td>
                    <td>{{ $evaluation->laboratory }}</td>
                    <td>{{ $evaluation->comfort_room }}</td>
                    <td>{{ $evaluation->canteen }}</td>
                    <td>{{ $evaluation->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
