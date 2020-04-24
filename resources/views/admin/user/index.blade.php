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
                            <th>action</th>
                        </tr>
                        @forelse($User as $users)
                            <tr>
                                <td>{{$users->id}}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->user_type }}</td>
                                <td>
                                    <a href="{{route('admin.user.edit', $users->id)}}"><button type="button" class="btn btn-primary float-left">Change Role</button></a>
                                    <form action="{{ route('admin.user.destroy', $users->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-warning">Disable account</button>
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
