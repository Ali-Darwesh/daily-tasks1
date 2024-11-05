<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Pending Tasks for Today</title>
</head>
<body>
    <h1>Your Pending Tasks for Today</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong><br>
                Due Date: {{ $task->due_date }}<br>
                Description: {{ $task->description }}<br>
            </li>
        @endforeach
    </ul>
</body>
</html>
