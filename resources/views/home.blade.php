@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-header">{{ __('Dashboard') }}  
                    <a href="{{ route('students.create') }}">Create Student</a>
                    <a href="{{ route('class-rooms.index') }}">Class</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $key => $student)
                            <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->age}}</td>
                            <td>
                                <a href="{{ route('students.delete', $student->id) }}">Delete</a>
                                <a href="{{ route('enroll.student', $student->id) }}">Enroll</a>
                                <a href="{{ route('unenroll.student', $student->id) }}">Unenroll</a>
                            </tr>
                            @empty
                            <tr>
                                No Student Found.
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
