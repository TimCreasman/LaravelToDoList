@extends('layout')

@section('content')
    <form method="POST" action="/tasks">
        @csrf
        <div class="form-group">
            <label for="name">Task Summary</label>
            <input name="description" type="text" class="form-control" id="name"">
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" class="form-control" id="priority">
                @foreach ($priorities as $priority)
                    <option>{{$priority->type}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
