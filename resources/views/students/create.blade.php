@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>New Student Info</h4></div>

                    <div class="card-body">
                        <form action="/students" method="post">
                            <div>
                                <label for="name">Name:</label>
                                <input type="text" name="name" autocomplete="off" value="{{old('name')}}">
                                @error('name')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="phone">Email:</label>
                                <input type="text" name="phone" autocomplete="off" value="{{old('phone')}}">
                                @error('phone')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="address">Phone:</label>
                                <input type="number" name="phone" autocomplete="off" value="{{old('address')}}">
                                @error('address')<p style="color: red">{{$message}}</p> @enderror
                            </div>
                            <!--This iz wrong, need to fix (User_id)-->
                            <div>
                                <label for="user_id">User ID: </label>
                                <select id="user_id" name="user_id" disabled>
                                    <option value="{{Auth::user()->user_id}}">{{Auth::user()->user_id}}</option>
                                </select>
                            </div>
                            @csrf
                            <button type="submit">Add new Student</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
