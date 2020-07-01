@extends('layout')

@section('content')
    <h1>Tasks:</h1>
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
            Sort options
        </button>
        <div class="dropdown-menu">
            <a href="/tasks" class="dropdown-item"> View all tasks </a>
            <a href="/tasks?completed=true" class="dropdown-item"> View complete tasks </a>
            <a href="/tasks?completed=false" class="dropdown-item"> View incomplete tasks </a>
        </div>
    </div>
    @if (request('priority'))
        <h4 class="">
            Filtering by: {{request('priority')}}
        </h4>
    @endif
    <div class="container-fluid d-flex flex-wrap" style="min-height: 10em">
        @foreach ($tasks as $task)
        <div class="card m-2" style="min-width: 20em; ">
            <div class="card-body d-flex flex-column justify-content-between">
                <h3 class="card-text text-truncate">
                    {{$task->description}}
                </h3>

                {{-- If the task is not completed show the complete button --}}
                @if (is_null($task->completed))
                    <form method="POST" action="{{$task->path()}}/complete">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success my-2">Complete task</button>
                    </form>
                @else
                    <h6 class="card-subtitle text-success">
                        Task complete!
                    </h6>
                @endif

                <a class="btn btn-primary ml-auto" href="{{$task->path()}}">
                    View more...
                </a>
                <div>
                    @foreach ($task->priorities as $priority)
                    <a href="/tasks?priority={{$priority->type}}" class="btn btn-outline-secondary btn-sm">{{$priority->type}}</a>
                    @endforeach
                </div>
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
