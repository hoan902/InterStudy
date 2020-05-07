@extends('layouts.navbar')
@extends('layouts.preloader')
@section('content')
    <div class="container h-50">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Edit Class Info</h4></div>

                    <div class="card-body">
                        <form action="/classroomManage/{{$classroom->id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Class name:</label>
                                <input class="form-control" id="name" type="text" name="name" autocomplete="off" value="{{$classroom->name}}">
                                @error('name')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="tutor_id">Tutor of this class</label>
                                <select class="form-control" id="tutor_id" type="radio" name="tutor_id" autocomplete="off" value="{{$classroom->tutor_id}}">
                                    <option value="{{ $classroom->tutor_id }}" selected hidden>{{ $classroom->tutor->name }}</option>
                                    @forelse(\App\Tutor::all() as $classTutor)
                                        <option value={{ $classTutor->id }}>{{ $classTutor->name }}</option>
                                    @empty
                                        <option value="" selected disabled>-- There no available tutor --</option>
                                    @endforelse
                                </select>
                                @error('tutor_id')<p style="color: red">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="student_id">Student of this class</label>
                                <select class="form-control" id="student_id" type="radio" name="student_id" autocomplete="off" value="{{$classroom->student_id}}">
                                    <option value="{{ $classroom->student_id }}" selected hidden>{{ $classroom->student->name }}</option>
                                    @forelse(\App\Student::all() as $studentClass)
                                        <option value={{ $studentClass->id }}>{{ $studentClass->name }}</option>
                                    @empty
                                        <option value="" selected disabled>-- There no available student --</option>
                                    @endforelse
                                </select>
                                @error('student_id')<p style="color: red">{{$message}}</p> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update classroom</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
