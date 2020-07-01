@extends('layout')

@section('content')
<h1>Editing {{$task->description}} task...</h1>
    <form method="POST" action="/tasks/{{$task->id}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Task Summary</label>
            <input name="description" type="text" class="form-control" id="name" value="{{$task->description}}">
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" class="form-control" id="priority">
                @foreach ($priorities as $priority)
                    <option>{{$priority->type}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
