<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $project->title }}</h1>

    <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <h2>Tasks</h2>
    <ul>
        @foreach($project->tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong>
                <p>{{ $task->description }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>