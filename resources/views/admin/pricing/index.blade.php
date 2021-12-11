@extends('admin.layout.app')

@section('content')
    <h1>Pricing</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <a href="{{ route('pricing.create') }}" class="btn btn-success" style="margin-right: 20px">Add</a>

    <table class="table text-center">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Price</th>
            <th>About</th>
        </tr>
        @foreach ($pricings as $pricing)
            <tr>
                <td>{{ $pricing->id }}</td>
                <td>{{ $pricing->type }}</td>
                <td>{{ $pricing->price }}</td>
                <td>{!! $pricing->about !!}</td>
                <td>
                    <a href="{{ route('pricing.edit', $pricing->id) }}" class="btn btn-primary">Edit</a>
                    <a href="pricing/delete/{{ $pricing->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $pricings->links() }}
@endsection
