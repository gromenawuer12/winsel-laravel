@extends('layouts.app')

@section('title','Home')

@section('content')
<form method="POST" action="/tasks">
    @csrf
    <div class="form-group">
        <label>Start</label>
        <input id="start" name="start" type="datetime-local" step="1"
            class="form-control @error('start') is-invalid @enderror">
        @error('start')
            <div id="errorstart" class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Time</label>
        <input id="duration" name="duration" type="time" step="1"
            class="form-control @error('duration') is-invalid @enderror">
        @error('duration')
            <div id="errorduration" class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Type</label>
        <select id="taskType" name="taskType" class="form-control @error('taskType') is-invalid @enderror">
            <option value="1" selected>Work</option>
            <option value="2">Leisure</option>
        </select>
        @error('taskType')
            <div id="errortaskType" class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Description</label>
        <input id="description" name="description" type="text"
            class="form-control @error('description') is-invalid @enderror">
        @error('description')
            <div id="errordescription" class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button id="create" name="create" type="submit" class="btn btn-primary">Create</button>
    <a name="cancel" class="btn btn-primary" href="{{ url('/') }}">Cancel</a>
</form>
@endsection
