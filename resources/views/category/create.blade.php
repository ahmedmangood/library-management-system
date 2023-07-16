@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
        <div class="col-md-6">
            <div class="card bg-gray">
                <div class="card-header text-center shadow-sm-me" style="font-size: 25px">
                    Add Category
                </div>
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="card-body text-right">
                        <div class="form-group">
                            <label for="cat_name">category name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{old('description')}}" class="form-control">
                            @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group text-center my-3">
                            <input type="submit" value="save" class="btn btn-primary w-50">
                        </div>
                    </div>
                </form>
            </div>
        </div>



        @endsection
