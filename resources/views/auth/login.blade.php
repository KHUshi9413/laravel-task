<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background: #f4f6f9;
            font-family: Arial;
        }
        .container {
            width: 400px;
            padding: 30px;
            margin: 80px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 6px;
            font-size: 16px;
        }
        a { text-decoration: none; color: #007bff; display: block; text-align:center; margin-top:10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>

    @if ($errors->any())
        <div style="color:red">{{ $errors->first() }}</div>
    @endif

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit">Login</button>
    </form>

    <a href="{{ route('register.submit') }}">Create an account</a>
</div>

</body>
</html>
