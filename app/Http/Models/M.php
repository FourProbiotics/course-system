<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class M extends Model
{
    /**
     * 实例化模型
     * @access      final   protected
     * @param       string $model 模型名称
     */
    final protected function model($model)
    {
        $model_name = 'App\Http\Models\\' . ucfirst($model);
        return new $model_name;
    }


}