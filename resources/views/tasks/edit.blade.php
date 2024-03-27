<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', [$projectId, $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ $task->title }}"><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{{ $task->description }}</textarea><br><br>
        <button type="submit">Update Task</button>
    </form>
    
</body>
</html>