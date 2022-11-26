@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-header">Class  
                    <a href="{{ route('class-rooms.create') }}">Create Class</a>
                    <a href="{{ route('home') }}">Home</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Seat</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($classes as $key => $class)
                            <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$class->name}}</td>
                            <td>{{$class->description}}</td>
                            <td>{{$class->seat}}</td>
                            <td><a href="{{ route('class-rooms.delete', $class->id) }}">Delete</a>
                            </tr>
                            @empty
                            <tr>
                                No Class Found.
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
