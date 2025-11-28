@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f0f2f5;
    }

    .task-container {
        min-height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .task-card {
        width: 100%;
        max-width: 600px;
        background: #ffffff;
        padding: 50px 40px;
        border-radius: 15px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .task-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    }

    .task-card h2 {
        font-weight: 700;
        color: #333;
        margin-bottom: 40px;
        text-align: center;
    }

    .form-label {
        font-weight: 600;
        color: #555;
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 12px 15px;
        margin-bottom: 20px;
        width: 100%;
    }

    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0,123,255,0.3);
    }

    .btn-custom {
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-back {
        background: #6c757d;
        color: #fff;
    }

    .btn-back:hover {
        background: #5a6268;
    }

    .btn-save {
        background: #007bff;
        color: #fff;
    }

    .btn-save:hover {
        background: #0069d9;
    }
</style>

<div class="task-container">
    <div class="task-card">

        <h2>Edit Task</h2>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="form-label">Task Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>

            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $task->description }}</textarea>

            <label class="form-label">Priority</label>
            <select name="priority" class="form-select">
                <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
            </select>

            <label class="form-label">Deadline</label>
            <input type="date" name="deadline" value="{{ $task->deadline }}" class="form-control">

            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('tasks.index') }}" class="btn btn-back btn-custom">Back</a>
                <button type="submit" class="btn btn-save btn-custom">Update Task</button>
            </div>

        </form>

    </div>
</div>

@endsection
