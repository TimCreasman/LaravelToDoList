@extends('layout')

@section('content')
    <h1>
        {{$task->description}}
    </h1>
    <h3>
        Status:
        <span>
            @if ($task->completed)
                Completed at {{$task->completed}}
            @else
                Incomplete
            @endif
        </span>
    </h3>
    <h3>
        Priorities: |
        @foreach ($priorities as $priority)
            <span>{{$priority->type}} |</span>
        @endforeach
    </h3>
    <h5>
        Created at: {{$task->created_at}}
    </h5>
    <h5>
        Last edited at: {{$task->updated_at}}
    </h5>
    <div class="btn-group" role="group">
        <a class="mr-2 btn btn-primary justify-content-center align-self-center" href="{{$task->path()}}/edit">
            Edit task
        </a>
        <form method="POST" action="{{$task->path()}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger justify-content-center align-self-center">Delete task</button>
        </form>
    </div>
@endsection
