@extends('layout')

@section('content')
    <h1>Tasks:</h1>
    <div class="container-fluid d-flex flex-wrap" style="min-height: 10em">
        @foreach ($tasks as $task)
        <div class="card m-2" style="min-width: 20em; ">
            <div class="card-body d-flex flex-column justify-content-between">
                <h3 class="card-text text-truncate">
                    {{$task->description}}
                </h3>
                <h6 class="card-subtitle {{$task->completed ? 'text-success' : 'text-muted'}}">
                    {{$task->completed ? 'Task complete!' : ''}}
                </h6>
                @if (is_null($task->completed))
                    <form method="POST" action="{{$task->path()}}/complete">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Complete task</button>
                    </form>
                @endif
                <a class="btn btn-primary ml-auto" href="{{$task->path()}}">
                    View more...
                </a>
            </div>
        </div>
        @endforeach
        <div class="card" style="width: 20em; margin: 2em;">
            <div class="d-flex align-items-center justify-content-center h-100">
                <a class="btn btn-primary justify-content-center align-self-center" href="/tasks/create">
                    Create new task
                </a>
            </div>
        </div>
    </div>
@endsection
