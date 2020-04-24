@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Edit Tutor Info</h4></div>

                    <div class="card-body">
                        <form action="/tutors/{{ $tutorID->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="name">Name:</label>
                                <input id="name" type="text" name="name" autocomplete="off" value="{{ $tutorID->name }}">
                                @error('name')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="phone">Phone:</label>
                                <input id="phone" type="number" name="phone" autocomplete="off" value="{{ $tutorID->phone }}">
                                @error('phone')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="address">Address:</label>
                                <input id="address" type="text" name="address" autocomplete="off" value="{{ $tutorID->address }}">
                                @error('address')<p style="color: red">{{$message}}</p> @enderror
                            </div>
                            <div hidden>
                                <label for="user_id">User ID: </label>
                                <input type="text" id="user_id" name="user_id" value="{{$tutorID->id}}" disabled>
                                <br>
                                <!--This iz for testing, to see what the user type are taken, might make it hidden later-->
                                <!--There a hole in here, user can mesh with url and go direct to here, so this profile might for user who is not a student, NID FIX-->
                            </div>
                            <button type="submit">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
