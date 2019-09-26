<?php

namespace App\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    const MSG_ERROR = "Ocorreu um erro interno. Tente novamente mais tarde";


    public function index()
    {
        try {

            return Response($this->repository->getAll(), 200);

        }catch(Exception $e) {
            if (env('APP_DEBUG')) {
                Response(["error" => $e->getMessage()],500);
            }
            return Response(["error" => self::MSG_ERROR], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $this->validate($request, $this->rules);

            $save = $this->repository->store($data);

            if(!$save) {
                return Response(["error" => self::MSG_ERROR], 500);
            }
            return Response($save, 200);
        }catch(Exception $e) {
            if (env('APP_DEBUG')) {
                Response(["error" => $e->getMessage()],500);
            }
            return Response(["error" => self::MSG_ERROR], 500);
        }
    }

    public function delete($id)
    {
        try {
            $remove  = $this->repository->delete($id);

            if(!$remove) {
                return Response(["error" => self::MSG_ERROR], 500);
            }
            return Response($remove, 200);
        }catch(Exception $e) {
            if (env('APP_DEBUG')) {
                Response(["error" => $e->getMessage()],500);
            }
            return Response(["error" => self::MSG_ERROR], 500);
        }
    }
}