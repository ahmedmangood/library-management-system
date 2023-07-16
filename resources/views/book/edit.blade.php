@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
        <div class="col-md-10">
            @if (session('message'))
            <div class="alert alert-success text-center my-2" role="alert">
                {{ session('message') }}
            </div>
        @endif
    <div class="card bg-gray">
        <div class="card-header text-center shadow-sm-me" style="font-size: 25px">
            Edit Book
        </div>
        <div class="w-50 m-auto">
        <div class="card-body">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>
        <div class="card-body">
            <form method="post" action="{{route('book.update',$book)}}"enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group show-image">
                    <img src="{{asset($book->image)}}" style="width: 100px; height: 100px;" alt="">
                </div>
                <div>
                    <label for="title">book name</label>
                    <input type="text" name="title" value="{{$book->title}}" class="form-control">
                    @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea type="text" name="description"   class="form-control">{{$book->description}}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="author">choose Author</label>
                    <select name="author" class="form-control">
                        <option value="{{$author->id}}">{{$author->author_name}}</option>
                        @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->author_name}}</option>
                        @endforeach
                    </select>
                    @error('author')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                    <div>
                        <label for="select">select category</label>
                        <select name="categories[]" class="form-control">
                            @foreach($categorys as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('categories')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                <div>
                    <label for="image">book image</label>
                    <input type="file" name="image"  class="form-control">
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden"  name="old_image"  value="{{$book->image}}">
                <div class="form-group text-center mt-4">
                    <input type="submit" class="btn btn-primary w-50" value="update" >
                </div>
            </form>
        </div>
    </div>
</div>
@endsection