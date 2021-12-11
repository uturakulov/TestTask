@extends('admin.layout.app')

@section('content')
    <h1>Categories</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <a href="{{ route('category.create') }}" class="btn btn-success" style="margin-right: 20px">Add</a>

    <table class="table text-center">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->created_at ?? 'NA' }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                    <a href="category/delete/{{ $category->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $categories->links() }}
@endsection
