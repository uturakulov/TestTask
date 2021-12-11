@extends('admin.layout.app')

@section('content')
    <div class="card card-primary col-md-6" style="margin-left: 15vw; margin-top: 10vh; height: 45vh">

        @if ($page == 'create')

            <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
                <h3 class="card-title">Add</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="img">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
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
            <form action="{{ route('portfolio.update', $portfolio->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="img">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="{{ $portfolio->category->id }}" selected>{{ $portfolio->category->title }}
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px">Update</button>
            </form>

        @endif
    </div>
@endsection
