<!DOCTYPE html>
<html>
<head>
    <title>Student Register</title>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
</head>
<body>
    <h2>Register</h2>
    @if(session('error')) <p style="color:red;">{{ session('error') }}</p> @endif




    <form>
    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Student ID:</label>
        <input type="text" name="student_id" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" required>
        <br>
        <label>Course:</label>
        <input type="text" name="course" required>
        <br>
        <label>College:</label>
        <input type="text" name="college" required>
        <br>
        <label>Phone Number:</label>
        <input type="text" name="phone_number" required>
        <br>
        <button type="submit">Register</button>
    </form>
</form>
</body>
</html>
