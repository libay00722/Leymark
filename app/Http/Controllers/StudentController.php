<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show form to create a student
    public function create()
    {
        return view('students.create');
    }

    // Save new student
    public function store(Request $request)
    {
        $request->validate([
            'studentNumber' => 'required|string|max:9|unique:students,studentNumber',
            'lname' => 'required|string|max:150',
            'fname' => 'required|string|max:150',
            'mi' => 'nullable|string|max:2',
            'email' => 'required|email|max:150|unique:students,email',
            'contactNumber' => 'nullable|string|max:20',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // Show form to edit a student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update student record
    public function update(Request $request, $id)
    {
        $request->validate([
            'studentNumber' => 'required|string|max:9|unique:students,studentNumber,' . $id,
            'lname' => 'required|string|max:150',
            'fname' => 'required|string|max:150',
            'mi' => 'nullable|string|max:2',
            'email' => 'required|email|max:150|unique:students,email,' . $id,
            'contactNumber' => 'nullable|string|max:20',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Delete student record
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}