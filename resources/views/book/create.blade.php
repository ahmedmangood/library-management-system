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
                        Add Book
                    </div>
                    <div class="w-50 m-auto">
                    <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body text-right">
                            <div class="form-group">
                                <label for="title" >BookName</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control" >
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div>
                                <label for="description">Description</label>
                            <textarea name="description" value="{{old('description')}}" class="form-control"></textarea>
                            @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            </div>
                            <div>
                                <label for="select">select category</label>
                                <select name="categories[]" class="form-control">
                                <option>Select Category</option>
                                    @foreach($cats as $cat)          
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('categories')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div>
                                <label for="select">select Author</label>
                                <select name="author" class="form-control">
                                <option >Select Author</option>
                                    @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->author_name}}</option>
                                    @endforeach
                                </select>
                                @error('author')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                            <label for="image" >Book image</label>
                            <input type="file" name="image" value="{{old('image')}}"  class="form-control">
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            </div>
                            <br>
                    <div class="form-group text-center">
                        <button class="btn btn-primary w-50" type="submit">submit</button>
                    </div>
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection