@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
        <div class="col-10">
        <h3 class="display-3">Managers</h3>
        <hr style="border: 1px solid">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card bg-gray">
          @if (Auth::user()->role == 1)
          <a href="{{ route('managers.create') }}" class="btn btn-primary col-md-4 btn-category">Add Manager <i class="fas fa-plus"></i></a>
            @endif
            <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                        <tbody>
                            @foreach($managers as $manager)
                                <tr>
                                    <td>{{ $manager->id }}</td>
                                    <td>{{ $manager->name }}</td>
                                    <td>{{ $manager->email }}</td>
                                   @if (Auth::user()->role == 1)
                                    <td>
                                        <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-success">Edit <i class="fas fa-pen-to-square"></i></a>
                                        <form action="{{ route('managers.destroy', $manager->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete <i class="fas fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </div>
                </table>
        </div>
    </div>
</div>
@endsection
