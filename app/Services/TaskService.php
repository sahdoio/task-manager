<?php

namespace App\Services;

use App\Helpers\APIResponse;
use App\Models\Task;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskService
{
    private $task;

    /**
     * Constructor method
     *
     * @param Post    $post
     * @param PostView $postView
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function create(string $title): JsonResponse
    {
        try {
            $task = Task::create([
                'title' => $title,
                'completed' => false
            ]);
            return APIResponse::success('Tasks crdated with success', $task->toArray());
        } catch (Exception $e) {
            return APIResponse::serverError(__('generic.internalServerError'));
        }
    }

    public function list(): JsonResponse
    {
        try {
            $tasks = $this->task->all()->toArray();
            return APIResponse::success('Tasks fetched with success', $tasks);
        } catch (Exception $e) {
            return APIResponse::serverError(__('generic.internalServerError'));
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $task = Task::find($id);

            if (!$task) {
                return APIResponse::notFound('Task not found');
            }

            $task->delete();
            return APIResponse::success('Task deleted with success');
        } catch (Exception $e) {
            return APIResponse::serverError(__('generic.internalServerError'));
        }
    }

    public function complete(int $id): JsonResponse
    {
        try {
            $task = Task::find($id);

            if (!$task) {
                return APIResponse::notFound('Task not found');
            }

            $task->completed = true;
            $task->save();
            return APIResponse::success('Task completed with success', $task->toArray());
        } catch (Exception $e) {
            return APIResponse::serverError(__('generic.internalServerError'));
        }
    }
}
