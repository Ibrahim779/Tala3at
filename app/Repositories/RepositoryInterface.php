<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{

    public function update(Model $model, $request);

    public function delete(Model $model);

}
