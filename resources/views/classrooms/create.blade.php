@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>New Class Info</h4></div>

                    <div class="card-body">
                        <form action="/classrooms" method="POST">
                            @csrf
                            <div>
                                <label for="name">Class name:</label>
                                <input id="name" type="text" name="name" autocomplete="off" value="{{old('name')}}">
                                @error('name')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="tutor_id">Tutor of this class</label>
                                <select id="tutor_id" type="radio" name="tutor_id" autocomplete="off" value="{{old('tutor_id')}}">
                                    <option value="" selected disabled hidden>-- choose a tutor --</option>
                                    @forelse($tutorClassroom as $classrooms)
                                        <option value={{ $classrooms->id }}>{{ $classrooms->name }}</option>
                                    @empty
                                        <option value="" selected disabled>-- There no available tutor --</option>
                                    @endforelse
                                </select>
                                @error('tutor_id')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div>
                                <label for="student_id">Student of this class</label>
                                <select id="student_id" type="radio" name="student_id" autocomplete="off" value="{{old('student_id')}}">
                                    <option value="" selected disabled hidden>-- choose a student --</option>
                                    @forelse($studentClassroom as $classrooms)
                                        <option value={{ $classrooms->id }}>{{ $classrooms->name }}</option>
                                    @empty
                                        <option value="" selected disabled>-- There no available student --</option>
                                    @endforelse
                                </select>
                                @error('student_id')<p style="color: red">{{$message}}</p> @enderror
                            </div>
                            <button type="submit">Create new classroom</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
