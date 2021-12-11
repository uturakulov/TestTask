@extends('admin.layout.app')

@section('content')
    <div class="card card-primary col-md-6" style="margin-left: 15vw; margin-top: -2vh; height: 89vh">

        @if ($page == 'create')

            <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
                <h3 class="card-title">Add</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Job</label>
                        <select name="job_id" class="form-control">
                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="img">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Facebook</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="facebook">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Twitter</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="twitter">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dribble</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="dribble">
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
            <form action="{{ route('employee.update', $employees->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                            value="{{ $employees->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Job</label>
                        <select name="job_id" class="form-control">
                            <option value="{{ $employees->job->id }}" selected>{{ $employees->job->title ?? 'NA' }}
                            </option>
                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="img">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Facebook</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="facebook"
                            value="{{ $employees->facebook }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Twitter</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="twitter"
                            value="{{ $employees->twitter }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dribble</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="dribble"
                            value="{{ $employees->dribble }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px">Update</button>
            </form>

        @endif
    </div>
@endsection
