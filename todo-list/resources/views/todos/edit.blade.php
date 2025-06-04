<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Todo</h1>

        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $todo->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="completed">Completed</label>
                <select class="form-control" id="completed" name="completed">
                    <option value="1" {{ $todo->completed ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$todo->completed ? 'selected' : '' }}>No</