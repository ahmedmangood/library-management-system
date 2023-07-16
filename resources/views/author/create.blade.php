@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
        <div class="col-10">
            <div class="card bg-gray">
                <div class="card-header text-center shadow-sm-me" style="font-size: 25px">
                    Add Author
                </div>
            <div class="w-50 m-auto">
                {{-- <h2 class="text-center">Add Author</h2> --}}
    {!! Form::open(['route' => 'author.store','method' => 'post','enctype' => 'multipart/form-data']) !!}
    <div class="card-body">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        {!!Form::text('author_name',null,['class'=>'form-control'])!!}
        @error('author_name')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        <label for="" class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
        @error('image')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        {!! Form::submit('Add',['class'=>'btn btn-primary w-50']) !!}
        {!! Form::close() !!}
    </div> 
</div>
</div>
    </div>
@endsection
