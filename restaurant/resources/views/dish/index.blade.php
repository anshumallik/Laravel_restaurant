@extends('layouts.admin.app')

@section('title','Dish')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt-3">
                    {{--<h1 class="display-3">Add Category</h1>--}}
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('dish.index')}}">Dish</a></li>
                    </ol>
                    <div>

                        <a style="margin: 19px;" href="{{ route('dish.create')}}"
                           class="btn btn-primary float-right">Add Dish</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            @if(sizeof($dishes) > 0)
                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Dish</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Thumbnail</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dishes as $dish)
                        <tr>
                            <td>{{ ++$id }}</td>
                            <td>{{ $dish->name}}</td>
                            <td>{{ $dish->category->name }}</td>
                            <td>{{ $dish->price }}</td>
                            <td><img src="{{ url('images/dish/'.$dish->image) }}"
                                     alt="{{ $dish->name }}"
                                     class="img-fluid" width="100" height="100"></td>
                            <td>
                                <form action="{{ route('dish.destroy', $dish->id) }}" method="POST"
                                      enctype="multipart/form-data">
                                    {{--<a class="btn btn-info" href="{{ route('dish.show', $dish->id) }}">Show</a>--}}
                                    <a class="btn btn-primary"
                                       href="{{ route('dish.edit',$dish->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Dish</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Thumbnail</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            @else
                <div class="alert alert-alert">Start Adding to the Database.</div>
            @endif
            {{--{!! $dishes->links() !!}--}}
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection