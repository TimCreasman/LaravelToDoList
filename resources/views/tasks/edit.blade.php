@extends('layout')

@section('content')
<h1>Editing {{$task->description}} task...</h1>
    <form method="POST" action="{{$task->path()}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Task Summary</label>
        <input
            name="description"
            type="text"
            class="form-control"
            id="name"
            value="{{$task->description}}"
            required>
        </div>
        <div class="form-group">
            <label for="priorities[]">Priortities</label>
            <select name="priorities[]" multiple class="form-control" id="priority" required>
                @foreach ($priorities as $priority)
                    <option value={{$priority->id}}>{{$priority->type}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
