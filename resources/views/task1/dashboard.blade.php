<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-header {
            text-align: center;
            margin: 40px 0;
        }
        .panel-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px 20px;
            margin-bottom: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .panel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        .panel-card h3 {
            margin-bottom: 15px;
        }
        .panel-card p {
            color: #6c757d;
            margin-bottom: 20px;
        }
        .btn-full {
            width: 100%;
        }
        .logout-btn {
            display: flex;
            justify-content: center;
        }
        .alert-custom {
            max-width: 600px;
            margin: 20px auto;
            font-size: 1rem;
        }
    </style>
</head>
<body>

<!-- ⭐ NAVBAR START ⭐ -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
        <a class="navbar-brand" href="/dashboard">
            MyApp
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- LEFT SIDE NAV -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">🏠 Dashboard</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('tasks.create') }}">📝 Tasks</a>

                </li>
                <li class="nav-item">
    <a class="nav-link" href="{{ route('documents.create') }}">📁 Documents</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('projects.create') }}">📝 Projects</a>
</li>

            </ul>

            <!-- RIGHT SIDE NAV -->
            <ul class="navbar-nav ms-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="userMenu" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="/profile">Profile</a>
                        </li>
                        
                        <li>
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>
<!-- ⭐ NAVBAR END ⭐ -->

<div class="container">

    @if(session('error'))
        <div class="alert alert-warning alert-dismissible fade show alert-custom" role="alert">
            🚫 {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="dashboard-header">
        <h1>👋 Welcome, {{ Auth::user()->name }}</h1>
        <p class="text-muted">Role: <strong>{{ Auth::user()->role }}</strong></p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="panel-card text-center">
                <h3>🛠 Admin Panel</h3>
                <p>Full access control for administrator.</p>
                <a href="/admin/dashboard" class="btn btn-dark btn-full">Go to Admin Panel</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel-card text-center">
                <h3>📊 Manager Panel</h3>
                <p>View and manage team-related data.</p>
                <a href="/manager" class="btn btn-warning btn-full">Go to Manager Panel</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel-card text-center">
                <h3>👤 User Panel</h3>
                <p>Basic user functionalities.</p>
                <a href="/userpanel" class="btn btn-primary btn-full">Go to User Panel</a>
            </div>
        </div>

    </div>

    <div class="logout-btn mt-5">
        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-danger btn-lg">Logout</button>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
