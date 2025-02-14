<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class AuthController extends Controller
{
    //register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students,student_id',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:6|confirmed',
            'course' => 'required|string',
            'college' => 'required|string',
            'phone_number' => 'required|string'

        ]);

        Student::create([

            'name' => $request->name,
            'student_id' => $request->student_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'course' => $request->course,
            'college' => $request->college,
            'phone_number' => $request->phone_number


        ]);

        return redirect('/login')->with('success', 'Registration successful, please login.');
    }

    //login
    public function login(Request $request)
    {
        $request->validate([

            'student_id' => 'required',
            'password' => 'required'

        ]);

        $student = Student::where('student_id', $request->student_id)->first();

        if (!$student || !Hash::check($request->password, $student->password)) {

            return back()->with('error', 'Invalid credentials');
        }

        session(['student' => $student]);

        return redirect('/profile'); 

    }

    //logout
    public function logout()
    {


        session()->forget('student');

        return redirect('/login')->with('success', 'Logged out successfully');

    }
    public function showProfile()
    {
        $student = session('student');
        return view('auth.profile', ['student' => $student]);
    }

    //go to edit
    public function editProfile()
    {
        $student = session('student');
        return view('auth.edit', ['student' => $student]);
    }

    //update
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . session('student')->id,
            'password' => 'nullable|min:6|confirmed',
            'course' => 'required|string',
            'college' => 'required|string',
            'phone_number' => 'required|string',

        ]);

        $student = Student::find(session('student')->id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->course = $request->course;
        $student->college = $request->college;
        $student->phone_number = $request->phone_number;

       
        if ($request->password) {

            $student->password = Hash::make($request->password);
        }

        $student->save();

    
        session(['student' => $student]);

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

    //delete
    public function deleteProfile()
    {
        $student = Student::find(session('student')->id);
        $student->delete();

        session()->forget('student');
        session()->flush();

        return redirect('/register')->with('success', 'Account deleted successfully.');
    }

}