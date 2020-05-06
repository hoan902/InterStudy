<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     //Display a listing of students.
    public function index()
    {
        $this->authorize('StaffAdminAuthorize');
       $Student = Student::latest()->paginate(10);

       return view('students.index',compact('Student'));
    }

    //Show the form for creating a new student.
    public function create()
    {
//        $this->authorize('StaffAdminAuthorize');
//        return view('students.create');
    }

    //Store a newly created student in storage.
    public function store(Request $request)
    {
//        $this->authorize('StaffAdminAuthorize');
//        $accosiateUserId = \App\User::all()->last()->id;
//        Request()->validate([
//            'name' => 'required',
//            'phone' => 'required',
//            'address' => 'required',
//            'DoB' => 'required|date',
//            'gender' => 'required',
//        ]);
//        $studentType = new Student();
//        $studentType -> name = request('name');
//        $studentType -> phone = request('phone');
//        $studentType -> address = request('address');
//        $studentType -> DoB = request('DoB');
//        $studentType -> gender = request('gender');
//        $studentType->user()->associate($accosiateUserId);
//        $studentType->save();
//       // Student::create($studentType);
//        return redirect('/students');
    }


    //Display the specified student.
    public function show(Student $studentID)
    {
        $this->authorize('StaffAdminAuthorize');
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
            'DoB' => 'required|date',
            'gender' => 'required',
            'profile_image' => 'image',
        ]);
        if(request()->has('profile_image')) {
            $imageUploaded = request()->file('profile_image');
            $imageName = time() . '.' . $imageUploaded->getClientOriginalExtension();
            $imagePatch = public_path('/ProfileImage/');
            $imageUploaded->move($imagePatch, $imageName);
            $studentID -> name = request('name');
            $studentID -> phone = request('phone');
            $studentID -> address = request('address');
            $studentID -> DoB = request('DoB');
            $studentID -> gender = request('gender');
            $studentID -> profile_image = $imageName;
            $studentID->user()->associate($studentID->user_id);
            $studentID->save();
        }else{
            $studentID -> name = request('name');
            $studentID -> phone = request('phone');
            $studentID -> address = request('address');
            $studentID -> DoB = request('DoB');
            $studentID -> gender = request('gender');
            $studentID->user()->associate($studentID->user_id);
            $studentID->save();
        }
        if(Auth::user()->user_type == 'staff'||Auth::user()->user_type == 'admin'){
        return redirect('/students/'. $studentID->id);
        }
        return redirect('/profile');
    }

    //Remove the specified student from storage.
    public function destroy(Student $student)
    {
        //
    }
    public function dashboard(Student $student){
        $classrooms =  $student->Classroom()->with('Tutor')->get();
        //   $comments =  $student->Classroom()->Posts()->Comments()->where('user_id',$student->User()->user_id);
        $comments = Comment::where('user_id',$student->user_id)->with('Post','Post.Classroom')->get()->sortByDesc('created_at');

        return view('students.dashboard',compact('student'))->with(compact('classrooms'))->with(compact('comments'));
    }
}
