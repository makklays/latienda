<?php
/**
 * Author: Alexander Kuziv
 * E-mail: alexander@makklays.com
 */

namespace App\Repositories;

use Illuminate\Support\Str;

abstract class Repository
{
    protected $model = FALSE;

    public function get()
    {
        $builder = $this->model->select('*');
        return $builder->get();
    }
}
