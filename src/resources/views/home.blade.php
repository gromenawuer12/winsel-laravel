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
            <th scope="col">taskType</th>
            <th scope="col">description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($taskList as $column)
                <td class="start">{{ $column->start }}</td>
                <td class="duration">{{ $column->duration }}</td>
                <td class="taskType">{{ $column->taskType }}</td>
                <td class="description">{{ $column->description }}</td>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
