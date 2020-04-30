@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>New Tutor Info</h4></div>

                    <div class="card-body">
                        <form action="/tutors" method="POST">
                            @csrf
                            <div>
                                <label for="name">Name:</label>
                                <input id="name" type="text" name="name" autocomplete="off" value="{{old('name')}}">
                                @error('name')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="phone">Phone:</label>
                                <input id="phone" type="tel" name="phone" autocomplete="off" value="{{old('phone')}}">
                                @error('phone')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="address">Address:</label>
                                <input id="address" type="text" name="address" autocomplete="off" value="{{old('address')}}">
                                @error('address')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="DoB">Day of Birth:</label>
                                <input id="DoB" type="date" name="DoB" autocomplete="off" value="{{old('DoB')}}">
                                @error('DoB')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="gender">Gender:</label>
                                <select id="gender" type="radio" name="gender" autocomplete="off" value="{{old('gender')}}">
                                    <option value="" selected disabled hidden>-- choose your gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('gender')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="user_id">User ID: </label>
                                <input type="text" id="user_id" name="user_id" value="{{\App\User::all()->last()->id}}" disabled>
                                <br>
                                <!--This iz for testing, to see what the user type are taken, might make it hidden later-->
                                <!--There a hole in here, user can mesh with url and go direct to here, so this profile might for user who is not a tutor, NID FIX-->
                                <label>User Type: {{\App\User::all()->last()->user_type}}</label>
                            </div>
                            <button type="submit">Add new Tutor</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
