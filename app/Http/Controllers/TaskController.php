<?php

namespace App\Http\Controllers;

use App\Helpers\APIResponse;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
        /**
     * Post service
     *
     * @var PostService
     */
    private TaskService $service;

    /**
     * Constructor method
     *
     * @param PostService $service
     *
     * @return void
     */
    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    /**
     * List method
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        return $this->service->list();
    }

    /**
     * Create method
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $validate = Validator::make($request->input(), [
            'title' => 'required|string'
        ]);

        if ($validate->fails()) {
            return APIResponse::badRequest($validate->getMessageBag()->all());
        }

        return $this->service->create($request->title);
    }

    /**
     * Delete method
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        return $this->service->delete($id);
    }

    /**
     * Complete method
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function complete(int $id): JsonResponse
    {
        return $this->service->complete($id);
    }
}
