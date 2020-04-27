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
                            <th>status</th>
                            <th>action</th>
                        </tr>
                        @forelse($User as $users)
                            <tr>
                                <td>{{$users->id}}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->user_type }}</td>
                                @if($users->user_type == 'student')
                                    @if($users->student->status == 1)
                                        <td style="color: limegreen"> Activate</td>
                                    @else
                                        <td style="color: red"> Deactivate</td> @endif
                                @elseif($users->user_type == 'tutor')
                                    @if($users->tutor->status == 1)
                                        <td style="color: limegreen"> Activate</td>
                                    @else
                                        <td style="color: red"> Deactivate</td> @endif
                                @elseif($users->user_type == 'staff')
                                    @if($users->staff->status == 1)
                                        <td style="color: limegreen"> Activate</td>
                                    @else
                                        <td style="color: red"> Deactivate</td> @endif
                                @elseif($users->user_type == 'admin')
                                    @if($users->admin->status == 1)
                                        <td style="color: limegreen"> Activate</td>
                                    @else
                                        <td style="color: red"> Deactivate</td> @endif
                                @endif
                                <td>
                                    <form action="{{ route('admin.user.destroy', $users->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-warning"
                                                @if($users->user_type == 'admin')
                                                hidden @endif>Disable account</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <td>No user to show</td>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
