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
        return view('students.create');
    }

    //Store a newly created student in storage.
    public function store(Request $request)
    {
        $accosiateUserId = \App\User::all()->last()->id;
        Request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $studentType = new Student();
        $studentType -> name = request('name');
        $studentType -> phone = request('phone');
        $studentType -> address = request('address');
        $studentType->user()->associate($accosiateUserId);
        $studentType->save();
       // Student::create($studentType);
        return redirect('/students');
    }


    //Display the specified student.
    public function show(Student $studentID)
    {
        return view('students.show',compact('studentID'));
    }

    //Show the form for editing the specified student.
    public function edit(Student $studentID)
    {
        return view('students.edit', compact('studentID'));
    }

     //Update the specified student in storage.
    public function update( Student $studentID)
    {
        Request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $studentID -> name = request('name');
        $studentID -> phone = request('phone');
        $studentID -> address = request('address');
        $studentID->user()->associate($studentID);
        $studentID->save();
        return redirect('/students/'. $studentID->id);
    }

    //Remove the specified student from storage.
    public function destroy(Student $student)
    {
        //
    }
}
