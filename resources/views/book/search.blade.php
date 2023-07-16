@extends('layouts.app')

@section('content')
<div class="container">
<!-- Search form -->
<form action="{{ route('search') }}" method="GET" class="mb-3 search-form">
    <div class="w-50">
        <button type="submit" class="btn btn-primary">Search <i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <div class="input-group">
        <input type="text" name="term" placeholder="Search by title or author" value="{{ request('term') }}" class="form-control">
    </div>

    <div class="input-group">
        <select name="order_by" class="form-control">
            <option value="name" {{ request('order_by') === 'name' ? 'selected' : '' }}>Name</option>
            <option value="latest" {{ request('order_by') === 'latest' ? 'selected' : '' }}>Latest</option>
        </select>
        {{-- <button type="submit" class="btn btn-primary">Order</button> --}}
    </div>
    <div class="input-group">
        <select name="category" class="form-control">
            <option value="">All Categories</option>
            <!-- Add options for categories -->
            @foreach (  \App\Models\Category::all() as $category)
            <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        {{-- <button type="submit" class="btn btn-primary">Filter</button> --}}
    </div>
</form>
</div>
    <div class="container my-5">
        <h3 class="display-3">All Books</h3>
        <hr style="border:1px solid">
        <div class="row">
            @foreach ($books as $book)
            <div class="col-md-4 d-flex justify-content-center">
            <div class="card my-4 bg-gray" style="width: 18rem;">
                <img class="card-img-top" src="{{$book->image}}" alt="Card image cap">
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
