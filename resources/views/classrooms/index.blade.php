@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container h-25">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>List of Classrooms</h3></div>

                    <div class="card-body">
                        <table style="width:100%" class="table-sm">
                            <tr>
                                <th>id</th>
                                <th>Class Name</th>
                                <th>Action</th>
                            </tr>
                            @forelse($classroom as $classrooms)
                                <tr>
                                    <td>
                                        <strong>
                                            {{ $classrooms->id }}
                                        </strong>
                                    </td>
                                    <td>
                                        <a href="/classroom/{{$classrooms->id}}"
                                           class="btn-link">{{ $classrooms->name }}</a>
                                    </td>
                                    <td>
                                        <form action="/classroom/{{ $classrooms->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-warning">Delete Class</button>
                                        </form>

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
