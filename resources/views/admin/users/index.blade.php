@extends('admin.layout.app')

@section('content')
    <h1>Users</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    {{-- <a href="{{ route('user.create') }}" class="btn btn-success" style="margin-right: 20px">Add</a> --}}

    <table class="table text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->message }}</td>
                <td>
                    <a href="users/delete/{{ $user->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
@endsection
