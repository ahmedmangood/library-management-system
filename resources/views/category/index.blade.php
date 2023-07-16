@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
<div class="col-10">
    <h3 class="display-3">Categories</h3>
    <hr style="border: 1px solid">
    <div class="card bg-gray">
    <a href="{{route('category.create')}}" type="submit" class="btn btn-primary col-md-4 btn-category">Add Category <i class="fas fa-plus"></i></a>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Num of Books</th>
                        <th scope="col">Decription</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Eelete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key=>$category)

                    <tr>
                        <td>{{$key = $key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->books->count()}}</td>
                        <td>{{$category->description}}</td>
                        <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-success">Edit <i class="fas fa-pen-to-square"></i></a></td>
                        <form action="{{route('category.destroy',$category->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <td>

                                <button type="submit" class="btn btn-danger">Delete <i class="fas fa-trash-can"></i></button>
                            </td>

                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>
</div>
@endsection
