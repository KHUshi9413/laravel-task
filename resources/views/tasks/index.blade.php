@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #eef1f5;
    }

    .task-card {
        max-width: 1100px;
        margin: 40px auto;
        padding: 25px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .task-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .task-header h2 {
        font-weight: 700;
        margin: 0;
    }

    .btn-create {
        background: #0d6efd;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 600;
        color: #fff;
    }

    .table {
        width: 100%;
    }

    .table th {
        background: #f8f9fa;
        font-weight: 600;
        padding: 12px 14px;
        text-align: left;
        font-size: 0.95rem;
        white-space: nowrap;
    }

    .table td {
        padding: 12px 14px;
        vertical-align: middle;
        font-size: 0.95rem;
    }

    /* PERFECT COLUMN WIDTHS */
    .col-title { width: 32%; }
    .col-priority { width: 15%; }
    .col-deadline { width: 18%; }
    .col-status { width: 15%; }
    .col-actions { width: 20%; }

    /* Action Icons */
    .action-icons i {
        font-size: 1.3rem;
        margin-right: 14px;
        cursor: pointer;
        transition: 0.2s;
    }

    .action-icons i:hover {
        transform: scale(1.20);
    }

    .view-icon { color: #0d6efd; }
    .edit-icon { color: #f4b400; }
    .delete-icon { color: #dc3545; }
</style>

<div class="task-card">

    <div class="task-header">
        <h2>Your Tasks</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-create">
            <i class="bi bi-plus-circle"></i> Create Task
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="col-title">Title</th>
                <th class="col-priority">Priority</th>
                <th class="col-deadline">Deadline</th>
                <th class="col-status">Status</th>
                <th class="col-actions">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ ucfirst($task->priority) }}</td>
                    <td>{{ $task->deadline ?? '--' }}</td>
                    <td>{{ ucfirst($task->status) }}</td>

                    <td class="action-icons">
                        <a href="{{ route('tasks.show', $task) }}">
                            <i class="bi bi-eye-fill view-icon"></i>
                        </a>

                        <a href="{{ route('tasks.edit', $task) }}">
                            <i class="bi bi-pencil-fill edit-icon"></i>
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" style="background:none;border:none;">
                                <i class="bi bi-trash-fill delete-icon"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        No tasks found.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

@endsection
