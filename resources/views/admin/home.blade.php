@extends('admin.layout.app')

@section('content')
    <h1>Admin Panel</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
@endsection
