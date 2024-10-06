
<!-- resources/views/admin/login.blade.php -->
@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="container">
    <h2>Admin Login</h2>
    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Admin Code</label>
            <input type="text" name="code" class="form-control" id="code" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
