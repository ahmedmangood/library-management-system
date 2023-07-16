@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
            <div class="col-10">
        @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
{{-- @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif --}}
        <div class="card bg-gray">
        <div class="card-header text-center shadow-sm-me" style="font-size: 25px">
            Create Manager
        </div>
        <div class="w-50 m-auto">
        <form action="{{ route('managers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">role</label>
                <select name="role" id="">
                    <option value="" selected disabled>select role</option>
                    <option value="1">super admin</option>
                    <option value="2">manger</option>
                    <option value="0">viewer</option>
                </select>
                @error('role')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-50">Create</button>
        </form>
    </div>
</div>
@endsection
