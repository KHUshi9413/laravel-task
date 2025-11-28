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
        padding: 40px 35px;
        border-radius: 15px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .task-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    }

    .task-title {
        font-weight: 700;
        font-size: 28px;
        color: #333;
        text-align: center;
        margin-bottom: 30px;
    }

    .task-detail {
        margin-bottom: 18px;
        font-size: 16px;
    }

    .task-detail strong {
        display: inline-block;
        width: 120px;
        color: #555;
        font-weight: 600;
    }

    .btn-back {
        background: #6c757d;
        color: #fff;
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: 600;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-back:hover {
        background: #5a6268;
        color: #fff;
    }

</style>

<div class="task-container">
    <div class="task-card">

        <div class="task-title">{{ $task->title }}</div>

        <p class="task-detail"><strong>Description:</strong> {{ $task->description }}</p>
        <p class="task-detail"><strong>Priority:</strong> {{ ucfirst($task->priority) }}</p>
        <p class="task-detail"><strong>Deadline:</strong> {{ $task->deadline }}</p>
        <p class="task-detail"><strong>Status:</strong> {{ ucfirst($task->status) }}</p>

        <div class="text-center mt-4">
            <a href="{{ route('tasks.index') }}" class="btn-back">Back</a>
        </div>

    </div>
</div>

@endsection
