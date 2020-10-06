@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="d-flex justify-content-end">
    <a id="logout" name="logout" class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
</div>
<div class="d-flex justify-content-center">
    <h1>Hello!</h1>
</div>

@endsection
