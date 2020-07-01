@extends('layout')

@section('content')
    <h1>
        {{$task->description}}
    </h1>
    <a class="btn btn-primary justify-content-center align-self-center" href="{{$task->path()}}/edit">
        Edit task
    </a>
    <a class="btn btn-danger justify-content-center align-self-center" href="{{$task->path()}}/delete">
        Delete task
    </a>
@endsection
