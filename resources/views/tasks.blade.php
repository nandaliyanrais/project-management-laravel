<!-- resources/views/tasks.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks</title>
</head>
<body>
    <h1>All Tasks for Project "{{ $project->title }}"</h1>

    <a href="{{ route('tasks.create', $project->id) }}">Create New Task</a>

    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong>
                <p>{{ $task->description }}</p>
                <a href="{{ route('tasks.edit', [$project->id, $task->id]) }}">Edit</a>
                <form action="{{ route('tasks.destroy', [$project->id, $task->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
