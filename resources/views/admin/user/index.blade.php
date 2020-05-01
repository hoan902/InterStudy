@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="h-50">
        <div class="card">
            <div class="card-header">
                <h3>Users list</h3>
            </div>
            <div class="card-body col-auto table-responsive text-nowrap">
                <table style="width:100%" class="table table-striped">
                    <tr>
                        <th>id</th>
                        <th>email</th>
                        <th>User Type</th>
                        <th>User Name</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    @forelse($User as $users)
                        <tr>
                            @if($users->student)
                                <td>{{$users->id}}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->user_type }}</td>
                                <td>{{ $users->student->name }}</td>
                                <td @if($users->student->status == 1)
                                    style="color: limegreen">
                                    @else
                                        style="color: red">
                                    @endif
                                    {{ $users->student->status ? 'Enabled' : 'Disabled' }}</td>
                            @elseif($users->tutor)
                                <td>{{$users->id}}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->user_type }}</td>
                                <td>{{ $users->tutor->name }}</td>
                                <td @if($users->tutor->status == 1)
                                    style="color: limegreen">
                                    @else
                                        style="color: red">
                                    @endif
                                    {{ $users->tutor->status ? 'Enabled' : 'Disabled' }}</td>
                            @elseif($users->staff)
                                <td>{{$users->id}}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->user_type }}</td>
                                <td>{{ $users->staff->name }}</td>
                                <td @if($users->staff->status == 1)
                                    style="color: limegreen">
                                    @else
                                        style="color: red">
                                    @endif
                                    {{ $users->staff->status ? 'Enabled' : 'Disabled' }}</td>
                                {{--                            Admin cannot delete admins --}}

                                {{--                            @elseif($users->admin)--}}
                                {{--                                <td>{{ $users->admin->name }}</td>--}}
                                {{--                                <td @if($users->admin->status == 1)--}}
                                {{--                                    style="color: limegreen">--}}
                                {{--                                    @else--}}
                                {{--                                        style="color: red">--}}
                                {{--                                    @endif--}}
                                {{--                                    {{ $users->admin->status ? 'Enabled' : 'Disabled' }}</td>--}}
                            @endif
                            <td>
                                <form action="{{ route('admin.user.destroy', $users->id) }}" method="POST"
                                      class="float-left">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-warning"
                                            @if($users->user_type == 'admin')
                                            hidden @endif>Disable account
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <td>No user to show</td>
                    @endforelse
                </table>
                            <th>action</th>
                        </tr>
                        @forelse($users as $user)
                            <tr>
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
                                @endif
                            </tr>
                        @empty
                            <td>No user to show</td>
                        @endforelse
                    </table>
            </div>
        </div>

    </div>
@endsection
