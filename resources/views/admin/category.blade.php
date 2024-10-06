<!-- resources/views/admin/category.blade.php -->
@extends('layouts.app')

@section('title', 'Candidates in ' . $category->name)

@section('content')
<div class="container">
    <h2>Candidates in {{ $category->name }}</h2>
    <ul class="list-group">
        @foreach($category->candidates as $candidate)
            <li class="list-group-item">{{ $candidate->first_name }} {{ $candidate->last_name }}</li>
        @endforeach
    </ul>
</div>
@endsection

<h3>Add New Candidate</h3>
<form action="{{ route('admin.candidate.store') }}" method="POST">
    @csrf
    <input type="hidden" name="category_id" value="{{ $category->id }}">
    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name" required>
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name" required>
    </div>
    <div class="mb-3">
        <label for="position" class="form-label">Position</label>
        <input type="text" class="form-control" name="position" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Candidate</button>
</form>
