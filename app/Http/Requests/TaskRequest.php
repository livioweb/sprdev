<?php

namespace App\Http\Requests;

class TaskRequest
{

    /**
     * Custom validation rules that apply to the request.
     *
     * @return array
     * @author Junior Freitas
     */
    public function rules()
    {
        return [
                "attribute.nome" => "required",
                "attribute.assunto" => "required",
                "attribute.status"=> "required",
                "attribute.ordem"=> "required",
            ];
    }

}