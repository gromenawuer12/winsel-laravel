@extends('layouts.app')

@section('title','Home')

@section('content')

<div class="d-flex justify-content-center">
    <h1>Hello!</h1>
</div>

<table class="table">
    <thead>
        <tr>
            <th id="start" scope="col">Start</th>
            <th id="duration" scope="col">Duration</th>
            <th id="taskType" scope="col">Type</th>
            <th id="description" scope="col">Description</th>
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
                    <button type="button" name="deleteTask" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                        X
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete the task?
        </div>
        <div class="modal-footer">
          <button name="cancelModal" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <form
                name="delete-task"
                action="{{ route('delete',['id' => 'substitute']) }}"
                method="POST">
                @method('DELETE')
                @csrf
                <button name="delete" class="btn btn-danger" type="submit">Delete Task</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
