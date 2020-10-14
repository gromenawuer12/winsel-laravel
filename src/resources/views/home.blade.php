@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="d-flex justify-content-end">
    <a id="logout" name="logout" class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
</div>
<div class="d-flex justify-content-center">
    <h1>Hello!</h1>
</div>
<a name="newtask" class="btn btn-primary" href="{{ url('/tasks/create') }}">New Task</a>
<table class="table">
    <thead>
        <tr>
            <th id="start" scope="col">start</th>
            <th id="duration" scope="col">duration</th>
            <th id="taskType" scope="col">type</th>
            <th id="description" scope="col">description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($taskList as $task)
            <tr id="task-{{ $task->id }}">
                <td>{{ $task->start }}</td>
                <td>{{ $task->duration }}</td>
                <td>{{ $task->taskType->name }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <form
                        action="{{ route('delete',['id' => $task->id]) }}"
                        method="POST">
                        @method('DELETE')
                        @csrf
                        <button name="delete" class="btn btn-danger" type="submit">X</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
