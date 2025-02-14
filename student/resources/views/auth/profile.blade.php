<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
</head>
<body>
    <h2>Welcome, {{ $student->name }}</h2>
    <p>Student ID: {{ $student->student_id }}</p>
    <p>Email: {{ $student->email }}</p>
    <p>Course: {{ $student->course }}</p>
    <p>College: {{ $student->college }}</p>
    <p>Phone Number: {{ $student->phone_number }}</p>

    <a href="{{ route('profile.edit') }}">Edit Profile</a>

    <form method="POST" action="{{ route('profile.delete') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">

        @csrf
        <button type="submit">Delete Profile</button>

    </form>

    <form method="POST" action="{{ url('/logout') }}">

        @csrf
        <button type="submit">Logout</button>

    </form>

</body>

</html>
