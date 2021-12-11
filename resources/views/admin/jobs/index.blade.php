@extends('admin.layout.app')

@section('content')
    <h1>Jobs</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <a href="{{ route('job.create') }}" class="btn btn-success" style="margin-right: 20px">Add</a>

    <table class="table text-center">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created</th>
        </tr>
        @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->created_at ?? 'NA' }}</td>
                <td>
                    <a href="{{ route('job.edit', $job->id) }}" class="btn btn-primary">Edit</a>
                    <a href="job/delete/{{ $job->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $jobs->links() }}
@endsection
