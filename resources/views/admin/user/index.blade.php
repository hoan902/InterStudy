@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Account List</div>
                <div class="card-body">
                    <table style="width:100%">
                        <tr>
                            <th>id</th>
                            <th>email</th>
                            <th>User Type</th>
<<<<<<< Updated upstream
                            <th>User Name</th>
                            <th>status</th>
=======
                            
>>>>>>> Stashed changes
                            <th>action</th>
                        </tr>
                        @forelse($users as $user)
                            <tr>
<<<<<<< Updated upstream
                                <td>{{$users->id}}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->user_type }}</td>
                                @if($users->student)
                                    <td>{{ $users->student->name }}</td>
                                        <td @if($users->student->status == 1)
                                                style="color: limegreen">
                                            @else
                                                style="color: red">
                                            @endif
                                            {{ $users->student->status ? 'Enable' : 'Disable' }}</td>
                                @elseif($users->tutor)
                                    <td>{{ $users->tutor->name }}</td>
                                    <td @if($users->tutor->status == 1)
                                        style="color: limegreen">
                                        @else
                                            style="color: red">
                                        @endif
                                        {{ $users->tutor->status ? 'Enable' : 'Disable' }}</td>
                                @elseif($users->staff)
                                    <td>{{ $users->staff->name }}</td>
                                    <td @if($users->staff->status == 1)
                                        style="color: limegreen">
                                        @else
                                            style="color: red">
                                        @endif
                                        {{ $users->staff->status ? 'Enable' : 'Disable' }}</td>
                                @elseif($users->admin)
                                    <td>{{ $users->admin->name }}</td>
                                    <td @if($users->admin->status == 1)
                                        style="color: limegreen">
                                        @else
                                            style="color: red">
                                        @endif
                                        {{ $users->admin->status ? 'Enable' : 'Disable' }}</td>
=======
                                @if($user->user_type !='admin')
                                <td>{{$user->id}}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_type }}</td>
                                <td><button class="btn btn-danger">Delete</button></td>
>>>>>>> Stashed changes
                                @endif
                            </tr>
                        @empty
                            <td>No user to show</td>
                        @endforelse
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
