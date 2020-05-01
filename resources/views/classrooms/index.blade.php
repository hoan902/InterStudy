@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container h-25">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card position-fixed">
                    <div class="card-header"><h3>List of Classrooms</h3></div>
                    <a class="btn btn-success" href="classroomManage/create" style="color: white"> Add New Classroom</a>
                    <div class="card-body table-bordered">
                        <table style="width:100%" class="table-sm">
                            <tr>
                                <th>id</th>
                                <th>Class Name</th>
                                <th>Class Tutor</th>
                                <th>Class Student</th>
                                <th>Delete</th>
                                <th>Update</th>
                            </tr>
                            @forelse($classroom as $classrooms)
                                <tr>
                                    <td>
                                        <strong>
                                            {{ $classrooms->id }}
                                        </strong>
                                    </td>
                                    <td>
                                        <a href="/classroomManage/{{$classrooms->id}}"
                                           class="btn-link">{{ $classrooms->name }}</a>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ $classrooms->tutor->name }}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ $classrooms->student->name }}
                                        </strong>
                                    </td>
                                    <td>
                                        <form action="/classroomManage/{{ $classrooms->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-warning">Delete Class</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form><a href="/classroomManage/{{ $classrooms->id }}/edit" class="btn btn-warning">Edit Class</a></form>

                                    </td>
                                </tr>
                            @empty
                                <p>No classrooms to show</p>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
