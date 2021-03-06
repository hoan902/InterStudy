@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container">
        <div class="row justify-content-center h-50">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Edit Staff Info</h4></div>

                    <div class="card-body">
                        <form action="/staffs/{{ $staffID->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-form-label">
                                <label for="profile_image">Profile Image (optional)</label>
                                <input class="card" id="profile_image" type="file" name="profile_image" autocomplete="off" value="{{ $staffID->profile_image }}">
                                @error('profile_image')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input class="form-control" id="name" type="text" name="name" autocomplete="off" value="{{ $staffID->name }}">
                                @error('name')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input class="form-control" id="phone" type="number" name="phone" autocomplete="off" value="{{ $staffID->phone }}">
                                @error('phone')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input class="form-control" id="address" type="text" name="address" autocomplete="off" value="{{ $staffID->address }}">
                                @error('address')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="DoB">Day of Birth:</label>
                                <input class="form-control" id="DoB" type="date" name="DoB" autocomplete="off" value="{{ $staffID->DoB }}">
                                @error('DoB')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group list-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" id="gender" type="radio" name="gender" autocomplete="off">
                                    <option value="Male" @if($staffID->gender == 'Male') selected @endif>Male</option>
                                    <option value="Female"@if($staffID->gender == 'Female') selected @endif>Female</option>
                                    <option value="Other"@if($staffID->gender == 'Other') selected @endif>Other</option>
                                </select>
                                @error('gender')<p style="color: red">{{$message}}</p> @enderror
                            </div>
                            <div hidden>
                                <label for="user_id">User ID: </label>
                                <input type="text" id="user_id" name="user_id" value="{{$staffID->id}}" disabled>
                                <br>
                                <!--This iz for testing, to see what the user type are taken, might make it hidden later-->
                                <!--There a hole in here, user can mesh with url and go direct to here, so this profile might for user who is not a student, NID FIX-->
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
