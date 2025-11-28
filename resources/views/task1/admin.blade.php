<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .panel-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px 20px;
            margin-top: 40px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .panel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        .panel-card h2 {
            margin-bottom: 15px;
        }
        .panel-card p {
            color: #6c757d;
            margin-bottom: 25px;
        }
        .btn-back {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="panel-card mx-auto" style="max-width: 600px;">
        <h2>⚙️ Admin Panel</h2>
        <p>Welcome! As an admin, you have full access to manage the system, users, and settings.</p>
        <a href="/dashboard" class="btn btn-secondary btn-lg btn-full">Back to Dashboard</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
