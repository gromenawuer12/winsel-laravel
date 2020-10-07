@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="d-flex justify-content-end">
    <a id="logout" name="logout" class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
</div>
<div class="d-flex justify-content-center">
    <h1>Hello!</h1>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">start</th>
            <th scope="col">duration</th>
            <th scope="col">type</th>
            <th scope="col">description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($taskList as $task)
            <tr>
                <td class="start">{{ $task->start }}</td>
                <td class="duration">{{ $task->duration }}</td>
                <td class="taskType">{{ $task->taskType->name }}</td>
                <td class="description">{{ $task->description }}</td>
        @endforeach
        </tr>
    </tbody>
</table>
@endsection
