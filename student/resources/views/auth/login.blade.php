<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
</head>
<body>
    <h2>Login</h2>
    @if(session('error')) <p style="color:red;">{{ session('error') }}</p> @endif
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <label>Student ID:</label>
        <input type="text" name="student_id" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="{{ route('show.register') }}">Register here</a></p>
</body>
</html>
