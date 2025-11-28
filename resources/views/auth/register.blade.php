<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            background: #eef2f3;
            font-family: Arial;
        }
        .container {
            width: 420px;
            padding: 30px;
            margin: 60px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        input, select {
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
            background: #28a745;
            color: white;
            border-radius: 6px;
            font-size: 16px;
        }
        a { text-decoration:none; color:#007bff; display:block; text-align:center; margin-top:10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Account</h2>

  <form method="POST" action="{{ route('register.submit') }}">

        @csrf

        <input type="text" name="name" placeholder="Full Name" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <select name="role" required>
            <option value="user">User</option>
            <option value="manager">Manager</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Register</button>
    </form>

    <a href="{{ route('login') }}">Already have an account?</a>
</div>

</body>
</html>
