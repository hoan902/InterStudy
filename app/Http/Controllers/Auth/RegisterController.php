<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Staff;
use App\Student;
use App\User;
use App\Tutor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    //Handle a registration request for the application.
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));


        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect($this->redirectPath());
    }

    /**
     * Where to redirect users after registration.
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    //Redirect to each create form depend on user_type to continue insert profile info of user
    protected function redirectTo()
    {
//        if (User::all()->last()->user_type == 'student') {
//            return '/students/create';
//        }
//        else if (User::all()->last()->user_type == 'tutor') {
//            return '/tutors/create';
//        }
//        else if (User::all()->last()->user_type == 'staff') {
//            return '/staffs/create';
//        }
        return '/';
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //middleware stop process if user is a guest
        $this->middleware('auth')->except('logout');
        //middleware stop user if they are not staff or admin (didn't add the error exception yet)
        $this->middleware('staffAdmin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type'=> ['required','string'],
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'DoB' => 'required|date',
            'gender' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type'=> $data['user_type'],
        ]);
        if(User::all()->last()->user_type == 'tutor'){
            $accosiateUserId = User::all()->last()->id;
            $userProfile = new Tutor();
        }else if(User::all()->last()->user_type == 'student'){
            $accosiateUserId = User::all()->last()->id;
            $userProfile = new Student();
        }else if(User::all()->last()->user_type == 'staff'){
            $accosiateUserId = User::all()->last()->id;
            $userProfile = new Staff();
        }else if(User::all()->last()->user_type == 'admin'){
            $accosiateUserId = User::all()->last()->id;
            $userProfile = new Admin();
        }
        $userProfile -> name = request('name');
        $userProfile -> phone = request('phone');
        $userProfile -> address = request('address');
        $userProfile -> DoB = request('DoB');
        $userProfile -> gender = request('gender');
        $userProfile->user()->associate($accosiateUserId);
        $userProfile->save();

        //should have a successful flash message to show. But idk how to do it yet
    }
    public function store(Request $request)
    {

        $accosiateUserId = User::all()->last()->id;
        Request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'DoB' => 'required|date',
            'gender' => 'required',
        ]);
        $tutorNew = new Tutor();
        $tutorNew -> name = request('name');
        $tutorNew -> phone = request('phone');
        $tutorNew -> address = request('address');
        $tutorNew -> DoB = request('DoB');
        $tutorNew -> gender = request('gender');
        $tutorNew->user()->associate($accosiateUserId);
        $tutorNew->save();
        // Student::create($studentType);
    }
}
