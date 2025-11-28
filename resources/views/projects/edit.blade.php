<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 700px; margin-top: 50px; }
        .alert-custom { max-width: 600px; margin: 20px auto; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">MyApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="/dashboard">🏠 Dashboard</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('projects.index') }}">📝 Projects</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><span class="nav-link text-white">{{ Auth::user()->name }}</span></li>
                <li class="nav-item">
                    <form method="POST" action="/logout">@csrf<button class="btn btn-danger btn-sm ms-2">Logout</button></form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2>Edit Project</h2>

    @if ($errors->any())
        <div class="alert alert-danger alert-custom">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Project Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Deadline</label>
            <input 
    type="date" 
    name="deadline" 
    class="form-control" 
    value="{{ old('deadline', optional($project->deadline)->format('Y-m-d')) }}" 
    required
>

        </div>
        <button type="submit" class="btn btn-success">Update Project</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">View All Projects</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
