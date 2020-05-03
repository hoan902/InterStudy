<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Comment;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    /*
     * Show personal tutees class
     */
    public function PersonalTutees(){
        $classroom = Classroom::latest()->paginate(10);
        return view('tutors.dashboard',compact('classroom'));
    }
    public function SearchTutees(Request $request){
        $search = $request->get('search');
        $classroom = Classroom::latest()->where('name','like', '%'.$search.'%')->paginate(10);
        return view('tutors.dashboard',compact('classroom'));
    }

    public function dashboard(Student $student){

        $classrooms =  $student->Classroom()->with('Tutor')->get();
        //   $comments =  $student->Classroom()->Posts()->Comments()->where('user_id',$student->User()->user_id);
        $comments = Comment::where('user_id',$student->user_id)->with('Post','Post.Classroom')->get()->sortByDesc('created_at');

        return view('home',compact('student'))->with(compact('classrooms'))->with(compact('comments'));
    }
    public function dashboardStaff(){

        $student = Student::latest()->paginate(10);

        return view('home',compact('student'));
    }
}
