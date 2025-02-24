<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #2c3e50;
            font-size: 2em;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.1em;
            margin: 5px 0;
        }
        a {
            display: inline-block;
            text-decoration: none;
            background-color: #3490dc;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s;
            margin-top: 10px;
        }
        a:hover {
            background-color: #2779bd;
        }
        form {
            display: inline;
        }
        button {
            background-color: #e3342f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
            margin-right: 10px;
        }
        button:hover {
            background-color: #cc1f1a;
        }
        button[type="submit"]:not(:last-child) {
            background-color: #555;
        }
        button[type="submit"]:not(:last-child):hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h2>Welcome, {{ $student->name }}</h2>
    <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Course:</strong> {{ $student->course }}</p>
    <p><strong>College:</strong> {{ $student->college }}</p>
    <p><strong>Phone Number:</strong> {{ $student->phone_number }}</p>

    <a href="{{ route('profile.edit') }}">Edit Profile</a>

    <form method="POST" action="{{ route('profile.delete') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')" style="display:inline;">
        @csrf
        <button type="submit">Delete Profile</button>
    </form>

    <form method="POST" action="{{ url('/logout') }}" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
