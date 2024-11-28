<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            font-family: "Averia Serif Libre", serif;
            color: black;
            margin-top: 100px;
            text-align: center;
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #343a40;
            color: #fff;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .text-center {
            margin-top: 20px;
            font-size: 18px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    @if ($evaluations->isEmpty())
        <h1>No evaluations found.</h1>
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
</body>
</html>
