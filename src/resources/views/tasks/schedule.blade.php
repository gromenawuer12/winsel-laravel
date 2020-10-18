@extends('layouts.app')

@section('title','Home')

@section('content')
<form method="POST" action="/tasks/schedule">
    @csrf
    <button id="previous" name="previous" type="submit" class="btn btn-primary"
        value="{{ $dates[0] }}">&lt;</button>
    <div class="form-group">
        <input id="date" name="date" type="date" value="{{ $dates[1] }}" onChange="onChangeDate()">
    </div>
    <button id="search" name="search" type="submit" class="btn btn-primary" value="{{ $dates[1] }}">Search</button>
    <button id="next" name=" next" type="submit" class="btn btn-primary" value="{{ $dates[2] }}">&gt;</button>
</form>
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
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    const onChangeDate = () => {
        {
            document.getElementById('search').value = document.getElementById('date').value;
        }
    };

</script>

@endsection
