<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Profile</h2>
    
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ $student->name }}" required>
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $student->email }}" required>
        <br>

        <label>Course:</label>
        <input type="text" name="course" value="{{ $student->course }}" required>
        <br>

        <label>College:</label>
        <input type="text" name="college" value="{{ $student->college }}" required>
        <br>

        <label>Phone Number:</label>
        <input type="text" name="phone_number" value="{{ $student->phone_number }}" required>
        <br>

        <label>New Password (Leave blank to keep the same):</label>
        <input type="password" name="password">
        <br>

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation">
        <br>

        <button type="submit">Update Profile</button>
    </form>

    <a href="{{ route('profile') }}">Back to Profile</a>
</body>
</html>
