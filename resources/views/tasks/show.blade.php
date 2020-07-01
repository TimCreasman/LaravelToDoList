@extends('layout')

@section('content')
    <h1>
        {{$task->description}}
    </h1>
    <a class="btn btn-primary justify-content-center align-self-center" href="{{$task->path()}}/edit">
        Edit task
    </a>
    <form method="POST" action="{{$task->path()}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger justify-content-center align-self-center">Delete task</button>
    </form>
@endsection
