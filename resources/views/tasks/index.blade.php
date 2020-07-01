@extends('layout')

@section('content')
    <h1>Tasks:</h1>
    <div class="container-fluid d-flex flex-wrap">
        @foreach ($tasks as $task)
        <div class="card" style="width: 20em; margin: 2em;">
            <div class="card-body d-flex flex-column justify-content-between">
                <h3 class="card-text text-truncate">
                    {{$task->description}}
                </h3>
                <div class="">
                    Completed:
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </div>
                <a class="btn btn-primary ml-auto" href="tasks/{{$task->id}}">
                    View more
                </a>

            </div>
        </div>
        @endforeach
        <div class="card" style="width: 20em; margin: 2em;">
            <div class="d-flex align-items-center justify-content-center h-100">
                <a class="btn btn-primary justify-content-center align-self-center" href="tasks/create">
                    Create new task
                </a>
            </div>
        </div>
    </div>
@endsection
