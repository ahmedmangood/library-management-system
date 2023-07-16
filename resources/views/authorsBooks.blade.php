@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container my-5">
        <h3 class="display-3">{{$author->author_name}}</h3>
        <hr style="border:1px solid">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card my-4 bg-gray" style="width: 18rem;">
                        <img class="card-img-top" src="http://127.0.0.1:8000/{{$book->image}}" alt="Card image cap">
                        <div class="card-body books-card">
                          <h5 class="card-title">book name: {{ $book->title }}</h5>
                          <h5>author name: {{ $book->author->author_name }}</h5>
                          <p class="card-text">desc: {{$book->description}}</p>
                          <p>
                            categories : 
                            @foreach ($book->categories as $category)
                            {{ $category->name }}<br>
                            @endforeach
                          </p>
                        </div>
                      </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection