<?php

namespace App\Http\Controllers;

use App\Tutor;
use Illuminate\Http\Request;
use App\User;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $Tutor = Tutor::latest()->paginate(10);

        return view('tutors.index',compact('Tutor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tutors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $accosiateUserId = User::all()->last()->id;
        Request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $tutorNew = new Tutor();
        $tutorNew -> name = request('name');
        $tutorNew -> phone = request('phone');
        $tutorNew -> address = request('address');
        $tutorNew->user()->associate($accosiateUserId);
        $tutorNew->save();
        // Student::create($studentType);
        return redirect('/tutors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutorID)
    {
        return view('tutors.show',compact('tutorID'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutorID)
    {
        return view('tutors.edit', compact('tutorID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutorID)
    {
        Request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $tutorID -> name = request('name');
        $tutorID -> phone = request('phone');
        $tutorID -> address = request('address');
        $tutorID->user()->associate($tutorID);
        $tutorID->save();
        return redirect('/tutors/'. $tutorID->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
