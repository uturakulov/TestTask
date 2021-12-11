@extends('admin.layout.app')

@section('content')
    <h1>Portfolio</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <a href="{{ route('portfolio.create') }}" class="btn btn-success" style="margin-right: 20px">Add</a>

    <table class="table text-center">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Category</th>
        </tr>
        @foreach ($portfolios as $portfolio)
            <tr>
                <td>{{ $portfolio->id }}</td>
                <td><img src="{{ $portfolio->img }}" alt="" width="200"></td>
                <td>{{ $portfolio->category->title ?? 'NA' }}</td>
                <td>
                    <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-primary">Edit</a>
                    <a href="portfolio/delete/{{ $portfolio->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $portfolios->links() }}
@endsection
