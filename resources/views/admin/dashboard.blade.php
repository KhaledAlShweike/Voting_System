<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h2>Categories</h2>
    <ul class="list-group">
        @foreach($categories as $category)
        <div class="mb-3">
            <h4>{{ $category->name }}</h4>
            @if($category->candidates->isNotEmpty())
                <p>Top Candidate: {{ $category->candidates->first()->first_name }} {{ $category->candidates->first()->last_name }}</p>
            @else
                <p>No candidates available.</p>
            @endif
        </div>
    @endforeach
