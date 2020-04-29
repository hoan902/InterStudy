<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Student;
use App\Tutor;
use App\User;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('StaffAdminAuthorize');
        $Classroom = Classroom::latest()->paginate(10);

        return view('classrooms.index',compact('Classroom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('StaffAdminAuthorize');
        $tutorClassroom = Tutor::all();
        $studentClassroom = Student::all();

        return view('classrooms.create',compact('tutorClassroom','studentClassroom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->authorize('StaffAdminAuthorize');
        Request()->validate([
            'name' => 'required',
            'tutor_id' => 'required',
            'student_id' => 'required',
        ]);
        $tutorNew = new Classroom();
        $tutorNew -> name = request('name');
        $tutorNew -> tutor_id = request('tutor_id');
        $tutorNew -> student_id = request('student_id');
        $tutorNew->save();
        // Student::create($studentType);
        return redirect('/classrooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classID)
    {
        return view('classrooms.view',compact($classID));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        //
    }
}
