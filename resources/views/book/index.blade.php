@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
        <div class="col-10">
            <h3 class="display-3">Books</h3>
            <hr style="border: 1px solid;">
            @if (session('message'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <div class="card bg-gray">
            <a href="{{route('book.create')}}" class="btn btn-primary col-md-4 btn-category">Add book <i class="fas fa-plus"></i></a>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">image</th>
                            <th scope="col">book name</th>
                            <th scope="col">Description</th>
                            <th scope="col">category</th>
                            <th scope="col">Author</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>

                        @if(count($books) > 0)
                        @foreach($books as $key => $book)
                        <tr>
                            <th scope="row">{{$key = $key+1}} </th>
                            <td><img src="{{asset($book->image)}}" width="90" class="img-style"></td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->description}}</td>
                            <td>@foreach($book->categories as $category){{$category->name}}<br>@endforeach</td>
                            <td>{{$book->author->author_name}}</td>
                            <td><a href="{{route('book.edit',$book->id)}}" class="btn btn-success">Edit <i class="fas fa-pen-to-square"></i></td>
                            <form action="{{route('book.destroy',$book->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <td>
                               
                                <button type="submit" class="btn btn-danger">Delete <i class="fas fa-trash-can"></i></button>
                            </td>
                         
                        </form>

                        </tr>

                        @endforeach
                        @else
                        <p>No meals</p>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @endsection