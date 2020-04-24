<?php

namespace App\Http\Controllers;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //Display a listing of students.
    public function index()
    {
        $Staff = Staff::latest()->paginate(10);

        return view('staffs.index',compact('Staff'));
    }

    //Show the form for creating a new student.
    public function create()
    {
        return view('staffs.create');
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
        $staffNew = new Staff();
        $staffNew -> name = request('name');
        $staffNew -> phone = request('phone');
        $staffNew -> address = request('address');
        $staffNew->user()->associate($accosiateUserId);
        $staffNew->save();
        // Student::create($studentType);
        return redirect('/staffs');
    }


    //Display the specified student.
    public function show(Staff $staffID)
    {
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
        ]);
        $staffID -> name = request('name');
        $staffID -> phone = request('phone');
        $staffID -> address = request('address');
        $staffID->user()->associate($staffID);
        $staffID->save();
        return redirect('/students/'. $staffID->id);
    }
}
