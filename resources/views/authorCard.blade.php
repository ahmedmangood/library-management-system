
@extends('layouts.app')
@section('content')
<div class="container  " >
  <div class="row row-cols-1 row-cols-md-3 g-4">

@foreach($authors as $author)
<div class="col">


  <div class="card py-3 text-center  shadow p-3 mb-5 bg-white rounded  " >
    {{--  /storage/app/  --}}
    <!-- Card image -->
    <div class="view overlay  ">
      <img class="card-img-top   p-3" src="{{$author->path}}"
        alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!-- Card content -->
    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title">{{$author->author_name}} </h4>
      <!-- Text -->
      <p class="card-text">Books Count: {{count($author->books)}}</p>
      <!-- Button -->
      <a href="{{url('authorsBooks/{author_id}')}}" class="btn btn-primary">Button</a>

    </div>

    </div>
    <!-- Card -->


  </div>
  @endforeach
</div>
</div>
@endsection

