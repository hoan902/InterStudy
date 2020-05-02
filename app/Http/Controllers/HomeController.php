<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;

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
        return view('home',compact('classroom'));
    }
    public function SearchTutees(Request $request){
        $search = $request->get('search');
        $classroom = Classroom::latest()->where('name','like', '%'.$search.'%')->paginate(10);
        return view('home',compact('classroom'));
    }
}
