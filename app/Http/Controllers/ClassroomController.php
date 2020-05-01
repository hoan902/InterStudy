<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Student;
use App\Tutor;
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
    public function viewClass(){
        $this->authorize('StaffAdminAuthorize');
        $classroom = Classroom::latest()->paginate(10);
        return view('classrooms.index',compact('classroom'));
    }
    public function createClass(){
        $this->authorize('StaffAdminAuthorize');
        $tutorClassroom = Tutor::all();
        $studentClassroom = Student::all();

        return view('classrooms.create',compact('tutorClassroom','studentClassroom'));
    }
    public function storeClass(){
        $this->authorize('StaffAdminAuthorize');
        $NewClassroom = Request()->validate([
            'name' => 'required',
            'tutor_id' => 'required',
            'student_id' => 'required',
        ]);
        Classroom::create($NewClassroom);

        return redirect('/classroom');
    }
    public function destroyClass(Classroom $classroom){
        $this->authorize('StaffAdminAuthorize');
        $classroom->delete();
        return redirect('/classroom');
    }

    public function index(Classroom $classroom)
    {
        $posts = $classroom->Posts()->get();
        return view('classroom.view',compact('classroom'))->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Classroom $classroom)
    {
        $classroom->Posts()->create([
            'title'=> request()->title,
            'content' => request()->postarea,
            'user_id' =>auth()->user()->id
        ]);
        return redirect('/classroom/'.$classroom->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
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

    }
}
