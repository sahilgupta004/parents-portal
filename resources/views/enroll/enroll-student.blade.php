@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-header">Enroll Student</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('enroll.studentclass') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Enroll</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" Disabled name="name" value="{{$student->name}}" required autocomplete="name" autofocus>
                                <input id="name" type="hidden" class="form-control" name="student_id" value="{{$student->id}}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">Age</label>

                            <div class="col-md-6">
                            <select class="form-select" name="class_room_id" aria-label="Default select example">
                                <option>Selec a Class</option>
                                @forelse($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                                @empty
                                <option>No Class</option>
                                @endforelse
                            </select>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Enroll Student
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection