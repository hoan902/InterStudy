<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     //Display a listing of students.
    public function index()
    {
       $Student = Student::latest()->paginate(10);

       return view('students.index',compact('Student'));
    }

    //Show the form for creating a new student.
    public function create()
    {
        //
    }

    //Store a newly created student in storage.
    public function store(Request $request)
    {
        //
    }


    //Display the specified student.
    public function show($studentID)
    {
        $Student = Student::find($studentID);
        return view('students.show',compact('Student'));
    }

    //Show the form for editing the specified student.
    public function edit(Student $student)
    {
        //
    }

     //Update the specified student in storage.
    public function update(Request $request, Student $student)
    {
        //
    }

    //Remove the specified student from storage.
    public function destroy(Student $student)
    {
        //
    }
}
