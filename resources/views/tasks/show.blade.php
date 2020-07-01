@extends('layout')

@section('content')
    <h1>
        {{$task->description}}
    </h1>
    <a class="btn btn-primary justify-content-center align-self-center" href="/tasks/{{$task->id}}/edit">
        Edit task
    </a>
@endsection
