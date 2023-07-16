@extends('layouts.app')
@section('content')
@if (session()->has('danger'))
<div class="container alert alert-danger">
    {{ session('danger') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
        <div class="col-10">
            <div class="card bg-gray">
                <div class="card-header text-center shadow-sm-me" style="font-size: 25px">
                    Edit Author
                </div>
            <div class="w-50 m-auto">
                {{-- <h2 class="text-center">Update Author</h2> --}}
                <div class="card-body text-right">
    {!! Form::model($author,['route' => ['author.update',$author],'method' => 'put']) !!}
        <div class="mb-3">
          <label for="author_name" class="form-label">Name</label>
          {!!Form::text('author_name',null,['class'=>'form-control'])!!}
            @error('author_name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        {!! Form::submit('update',['class'=>'btn btn-primary w-50']) !!}
        {!! Form::close() !!}
</div>
    </div>
</div>
@endsection
