<?php

namespace App\Http\Controllers;

use App\Tutor;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
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
        $Tutor = Tutor::all();

        return view('tutors.index',compact('Tutor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        $this->authorize('StaffAdminAuthorize');
//        return view('tutors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
//        $this->authorize('StaffAdminAuthorize');
//        $accosiateUserId = User::all()->last()->id;
//        Request()->validate([
//            'name' => 'required',
//            'phone' => 'required',
//            'address' => 'required',
//            'DoB' => 'required|date',
//            'gender' => 'required',
//        ]);
//        $tutorNew = new Tutor();
//        $tutorNew -> name = request('name');
//        $tutorNew -> phone = request('phone');
//        $tutorNew -> address = request('address');
//        $tutorNew -> DoB = request('DoB');
//        $tutorNew -> gender = request('gender');
//        $tutorNew->user()->associate($accosiateUserId);
//        $tutorNew->save();
//        // Student::create($studentType);
//        return redirect('/tutors');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Tutor $tutorID)
    {
        $this->authorize('StaffAdminAuthorize');
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
     */
    public function update(Request $request, Tutor $tutorID)
    {
        $userID = $tutorID->user_id;
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
            $tutorID -> name = request('name');
            $tutorID -> phone = request('phone');
            $tutorID -> address = request('address');
            $tutorID -> DoB = request('DoB');
            $tutorID -> gender = request('gender');
            $tutorID -> profile_image = $imageName;
            $tutorID->user()->associate($tutorID->user_id);
            $tutorID->save();
        }else{
            $tutorID -> name = request('name');
            $tutorID -> phone = request('phone');
            $tutorID -> address = request('address');
            $tutorID -> DoB = request('DoB');
            $tutorID -> gender = request('gender');
            $tutorID->user()->associate($tutorID->user_id);
            $tutorID->save();
        }
        if(Auth::user()->user_type == 'staff'||Auth::user()->user_type == 'admin'){
            return redirect('/tutors/'. $tutorID->id);
        }
        return redirect('/profile');
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
