<?php

namespace App\Core;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public static function create(array $attributes = [])
    {
        return true;
    }

    public function update(array $attributes = [], array $options = [])
    {

            return false;

    }

}