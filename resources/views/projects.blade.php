<!-- resources/views/projects.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Projects</title>
</head>
<body>
    <h1>All Projects</h1>

    <a href="{{ route('projects.create') }}">Create New Project</a>

    <ul>
        @foreach($projects as $project)
            <li>
                <strong>{{ $project->title }}</strong>
                <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
