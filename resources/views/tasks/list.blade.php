@extends('layout')

@section('content')
    <h1>Tasks:</h1>
    <div class="container-fluid d-flex flex-wrap">
        @foreach ($tasks as $task)
        <div class="card" style="width: 20em; margin: 2em;">
            <h5 class="card-header">
                {{$task->name}}
            </h5>
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="card-text">
                    {{$task->description}}
                </div>
                <a class="btn btn-primary ml-auto" href="tasks/{{$task->id}}">
                    View more
                </a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
