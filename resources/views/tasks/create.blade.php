@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f0f2f5;
    }

    .task-container {
        min-height: 90vh; /* vertical center */
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .task-card {
        width: 100%;
        max-width: 600px; /* larger card for full-width inputs */
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
        margin-bottom: 20px; /* proper spacing */
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
        background: #28a745;
        color: #fff;
    }

    .btn-save:hover {
        background: #218838;
    }

</style>

<div class="task-container">
    <div class="task-card">

        <h2>Create New Task</h2>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <label class="form-label">Task Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter task title" required>

            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Task description"></textarea>

            <label class="form-label">Priority</label>
            <select name="priority" class="form-select">
                <option value="low">Low</option>
                <option value="medium" selected>Medium</option>
                <option value="high">High</option>
            </select>

            <label class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control">

            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending" selected>Pending</option>
                <option value="completed">Completed</option>
            </select>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('tasks.index') }}" class="btn btn-back btn-custom">Back</a>
                <button type="submit" class="btn btn-save btn-custom">Save Task</button>
            </div>

        </form>

    </div>
</div>
@endsection
