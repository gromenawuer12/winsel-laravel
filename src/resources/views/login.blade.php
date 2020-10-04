@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="bg-light mt-4 d-flex justify-content-center">
    <form method="POST" action="loginController">
        <div class="form-group">
            @csrf
            <label for="username">Username</label>
            <input id="username" name="username" type="text"
                class="form-control @error('username') is-invalid @enderror">
            @error('username')
                <div id="errorusername" class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password"
                class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div id="errorpassword" class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark btn-block">Submit</button>
    </form>
</div>
@endsection
