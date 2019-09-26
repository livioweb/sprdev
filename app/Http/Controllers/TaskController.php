<?php

namespace App\Http\Controllers;

use App\Core\BaseController;
use App\Http\Requests\TaskRequest;
use App\Repository\TaskRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class TaskController extends BaseController
{

    private $repository;
    private $rules;

    public function __construct(TaskRepository $taskRepository, TaskRequest $request)
    {
        $this->repository = $taskRepository;
        $this->rules = $request->rules();
    }

    public function getTaskById($sku)
    {
        try {
            return Response($this->repository->getTaskById($sku));

        }catch(Exception $e) {
            if (env('APP_DEBUG')) {
                Response(["error" => $e->getMessage()],500);
            }
            return Response(["error" => self::MSG_ERROR], 500);
        }
    }

    /**
     * @param $id
     * @param $site
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function storeTask($id, $site)
    {
        try {
            $sended = $this->repository->store($id, $site);

            return Response()->json($sended,200);

        }catch(Exception $e) {
            if (env('APP_DEBUG')) {
                Response(["error" => $e->getMessage()],500);
            }
            return Response(["error" => self::MSG_ERROR], 500);
        }
    }


}
