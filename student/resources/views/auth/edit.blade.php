<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
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
        form {
            max-width: 600px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #3490dc;
            box-shadow: 0 0 5px rgba(52, 144, 220, 0.5);
        }
        button {
            background-color: #3490dc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #2779bd;
        }
        a {
            display: inline-block;
            text-decoration: none;
            color: #3490dc;
            margin-top: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Edit Profile</h2>
    
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ $student->name }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $student->email }}" required>

        <label>Course:</label>
        <input type="text" name="course" value="{{ $student->course }}" required>

        <label>College:</label>
        <input type="text" name="college" value="{{ $student->college }}" required>

        <label>Phone Number:</label>
        <input type="text" name="phone_number" value="{{ $student->phone_number }}" required>

        <label>New Password (Leave blank to keep the same):</label>
        <input type="password" name="password">

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation">

        <button type="submit">Update Profile</button>
    </form>

    <a href="{{ route('profile') }}">Back to Profile</a>
</body>
</html>
