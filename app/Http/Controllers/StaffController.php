<?php

namespace App\Http\Controllers;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Display a listing of students.
    public function index()
    {
        $this->authorize('StaffAdminAuthorize');
        $Staff = Staff::latest()->paginate(10);

        return view('staffs.index',compact('Staff'));
    }

    //Show the form for creating a new student.
    public function create()
    {
//        $this->authorize('StaffAdminAuthorize');
//        return view('staffs.create');
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
//        $staffNew = new Staff();
//        $staffNew -> name = request('name');
//        $staffNew -> phone = request('phone');
//        $staffNew -> address = request('address');
//        $staffNew -> DoB = request('DoB');
//        $staffNew -> gender = request('gender');
//        $staffNew->user()->associate($accosiateUserId);
//        $staffNew->save();
//        // Student::create($studentType);
//        return redirect('/staffs');
    }


    //Display the specified student.
    public function show(Staff $staffID)
    {
        $this->authorize('StaffAdminAuthorize');
        return view('staffs.show',compact('staffID'));
    }

    //Show the form for editing the specified student.
    public function edit(Staff $staffID)
    {
        return view('staffs.edit', compact('staffID'));
    }

    //Update the specified student in storage.
    public function update( Staff $staffID)
    {
        Request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'DoB' => 'required|date',
            'gender' => 'required',
            'profile_image' => 'image',
        ]);
        if(request()->has('profile_image')){
            $imageUploaded = request()->file('profile_image');
            $imageName = time() . '.' . $imageUploaded -> getClientOriginalExtension();
            $imagePatch = public_path('/ProfileImage/');
            $imageUploaded->move($imagePatch,$imageName);
            $staffID -> name = request('name');
            $staffID -> phone = request('phone');
            $staffID -> address = request('address');
            $staffID -> DoB = request('DoB');
            $staffID -> gender = request('gender');
            $staffID -> profile_image = $imageName;
            $staffID->user()->associate($staffID->user_id);
            $staffID->save();
        }else{
            $staffID -> name = request('name');
            $staffID -> phone = request('phone');
            $staffID -> address = request('address');
            $staffID -> DoB = request('DoB');
            $staffID -> gender = request('gender');
            $staffID->user()->associate($staffID->user_id);
            $staffID->save();
        }
        return redirect('/staffs/'. $staffID->id);
    }
}
