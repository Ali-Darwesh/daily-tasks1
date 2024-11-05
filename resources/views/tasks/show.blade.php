@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Task Details</h1>

    <h3>{{ $task->title }}</h3>
    <p><strong>Description:</strong> {{ $task->description }}</p>
    <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('d-m-Y') }}</p>
    <p><strong>Status:</strong> {{ $task->status }}</p>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</div>
@endsection
