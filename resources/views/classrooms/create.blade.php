@extends('layouts.navbar')
@extends('layouts.preloader')
@section('content')
    <div class="container h-50">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>New Class Info</h4></div>

                    <div class="card-body">
                        <form action="/classroomManage" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Class name:</label>
                                <input id="name" class="form-control" type="text" name="name" autocomplete="off" value="{{old('name')}}">
                                @error('name')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="tutor_id">Tutor of this class</label>
                                <select id="tutor_id" class="form-control" type="radio" name="tutor_id" autocomplete="off" value="{{old('tutor_id')}}">
                                    <option value="" selected disabled hidden>-- choose a tutor --</option>
                                    @forelse($tutorClassroom as $classrooms)
                                        <option value={{ $classrooms->id }}>{{ $classrooms->name }}</option>
                                    @empty
                                        <option value="" selected disabled>-- There no available tutor --</option>
                                    @endforelse
                                </select>
                                @error('tutor_id')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="student_id">Student of this class</label>
                                <select id="student_id" class="form-control" type="radio" name="student_id" autocomplete="off" value="{{old('student_id')}}">
                                    <option value="" selected disabled hidden>-- choose a student --</option>
                                    @forelse($studentClassroom as $classrooms)
                                        <option value={{ $classrooms->id }}>{{ $classrooms->name }}</option>
                                    @empty
                                        <option value="" selected disabled>-- There no available student --</option>
                                    @endforelse
                                </select>
                                @error('student_id')<p style="color: red">{{$message}}</p> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create new classroom</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
