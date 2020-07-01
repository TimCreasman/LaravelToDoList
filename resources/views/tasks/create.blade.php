@extends('layout')

@section('content')
    <form method="POST" action="/tasks">
        @csrf
        <div class="form-group">
            <label for="name">Task Summary</label>
        <input
            name="description"
            type="text"
            class="form-control"
            id="name"
            value="{{old('description')}}"
            required>
        </div>
        <div class="form-group">
            <label for="task_priority_id">Priority</label>
            <select name="task_priority_id" class="form-control" id="priority" required>
                @foreach ($priorities as $priority)
                    <option value={{$priority->id}}>{{$priority->type}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
