@extends('admin.layout.app')

@section('content')
    <div class="card card-primary col-md-6" style="margin-left: 15vw; margin-top: 10vh; height: 32vh">

        @if ($page == 'create')

            <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
                <h3 class="card-title">Add</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('job.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px">Add</button>
            </form>

        @else

            <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
                <h3 class="card-title">Update</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('job.update', $jobs->id) }}" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title"
                            value="{{ $jobs->title }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px">Update</button>
            </form>

        @endif
    </div>
@endsection
