@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Task Management</h1>

    <!-- Display tasks -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Task Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Assigned to</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d-m-Y') }}</td>
                    <td>{{ $task->assigned_to }}</td>
                    <td>
                        <!-- Form to toggle the task's status -->
                        <form action="{{ route('tasks.updateStatus', $task) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-sm btn-primary">
                                Update Status
                            </button>
                        </form>
                    </td>
                    <td>
                        <!-- Edit and delete buttons -->
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>
                        
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add New Task Button -->
    <a href="{{ route('tasks.create') }}" class="btn btn-success">Add New Task</a>
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
