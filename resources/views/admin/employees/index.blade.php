@extends('admin.layout.app')

@section('content')
    <h1>Employees</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <a href="{{ route('employee.create') }}" class="btn btn-success" style="margin-right: 20px">Add</a>

    <table class="table text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Job</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>Dribble</th>
            <th>Image</th>
        </tr>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->job->title ?? 'NA' }}</td>
                <td>{{ $employee->facebook ?? 'NA' }}</td>
                <td>{{ $employee->twitter ?? 'NA' }}</td>
                <td>{{ $employee->drible ?? 'NA' }}</td>
                <td><img src="{{ $employee->img }}" alt="" width="200"></td>
                <td>
                    <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                    <a href="employee/delete/{{ $employee->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $employees->links() }}
@endsection
