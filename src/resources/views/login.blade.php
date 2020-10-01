@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="bg-light mt-4 d-flex justify-content-center">
    <form method="POST" action="loginController">
        <div class="form-group">
            @csrf
            <label for="name">Username</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password"
                class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark btn-block">Submit</button>
    </form>
</div>
@endsection
