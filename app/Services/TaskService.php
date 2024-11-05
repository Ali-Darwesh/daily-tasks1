<?php
namespace App\Services;

use App\Models\Task;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class TaskService
{
        /**
     * service to create task.
     * @param array $data
     * @return array 

     */

    public function createTask( array $data){
        try {
            $task = Task::create($data);
            return ['message' => 'task created successfully', 'data' => $task, 'status' => 200];
        } catch (Exception $e) {
            Log::error('Error updating Task: ' . $e->getMessage());
            throw new HttpResponseException(response()->json(['message'=>'there is something wrong in server'],status:500));
        }
    }
    /**
     * service to update task data in storage.
     * @param Task $task
     * @param array $data
     * @return array 

     */
    public function updateTask(Task $task,array $data){
        try {
            $task = Task::findOrFail($task->id);
            $task->update($data);
            return ['message' => 'task updated successfully', 'task' => $task, 'status' => 200];
        } catch (Exception $e) {
        Log::error('Error updating Task: ' . $e->getMessage());
        throw new HttpResponseException(response()->json(['message'=>'there is something wrong in server'],status:500));
    }
}
/**
 * service method used to delete task from storage.
 * @param Task $task
 *@return array

 */
public function deleteTask(Task $task)
{
    try {
        $task = Task::findOrFail($task->id);
        $task->delete();
        return ['message' => 'Task deleted successfully', 'status' => 200];
    } catch (Exception $e) {
        Log::error('Error deleting Task: ' . $e->getMessage());
        throw new HttpResponseException(response()->json(['message'=>'there is something wrong in server'],status:500));
    }
    }
}
