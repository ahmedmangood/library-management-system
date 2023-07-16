@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
      <div class="col-10">
        <h3 class="display-3">Authors</h3>
        <hr style="border: 1px solid">
<div class="card bg-gray">
        <a href="{{ route('author.create') }}" type="button" class="btn btn-primary col-md-4 btn-category">Add Author <i class="fas fa-plus"></i></a>
        @if (session()->has('success'))
        <div class="container alert alert-success text-center">
            {{ session('success') }}
            </div>
        @endif
        @if (session()->has('danger'))
        <div class="container alert alert-danger text-center">
            {{ session('danger') }}
            </div>
        @endif
        <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Num of books</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($authors as $author)
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{asset($author->path)}}" width="90" class="img-style"></td>
                <td>{{$author->author_name}}</td>
                <td>{{$author->books->count()}}</td>
                <td>
                    <a href="{{ route('author.edit',$author->id) }}" type="button" class="btn btn-success" value="edit">Edit <i class="fas fa-pen-to-square"></i>
                    </td>
                    <td>
                        <form action="{{ route('author.destroy',$author->id) }}" method="post">
                            @csrf
                            @method('delete')
                    <button type="submit" class="btn btn-danger">Delete <i class="fas fa-trash-can"></i></button>
                        </form>
                    </td>
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
