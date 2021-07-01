<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    protected $model;

    const PAGINATION = 5;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getWithPagination($count = null)
    {
        return $this->model->paginate($count ?: self::PAGINATION);
    }

    public function createOrUpdate(Model $model, $request)
    {
        $this->saveData($model, $request);
    }

    public function delete(Model $model)
    {
       $this->model->delete();
    }

    public abstract function saveData($model, $request);
}
