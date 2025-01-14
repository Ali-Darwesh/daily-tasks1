<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest\StoreTaskRequest;
use App\Http\Requests\Taskrequest\UpdateTaskRequest;
use App\Http\Requests\TaskRequest\UpdateTaskStatusRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService=$taskService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all(); // Get all tasks
        return view('tasks.index', compact('tasks')); // Return the index view with the tasks
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validateData=$request->validated();
        $task=$this->taskService->createTask($validateData);
        return $this->success($task['data'],$task['message'],$task['status']);
    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task')); // Return the task edit form
    }
    // Show form to create a new task
    public function create()
    {
        return view('tasks.create');
    }
    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validatedData = $request->validated();
        $task = $this->taskService->updateTask($task, $validatedData);
        return $this->success($task['task'], $task['message'], $task['status']);
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateTaskStatus(UpdateTaskStatusRequest $request, Task $task)
    {
        $validatedData = $request->validated();
        $task = $this->taskService->updateTask($task, $validatedData);
        return $this->success($task['task'], $task['message'], $task['status']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task=$this->taskService->deleteTask($task);
        return $this->success(null, $task['message'], $task['status']);

    }
}
